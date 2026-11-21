<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CafeController extends Controller
{
    private function cfg(string $modul): array
    {
        $cfg = config("cafeku.modul.$modul");
        abort_if(!$cfg, 404, 'Modul tidak ditemukan.');

        return $cfg;
    }

    private function rules(array $cfg, $id = null): array
    {
        $table = (new $cfg['model'])->getTable();
        $rules = [];

        foreach ($cfg['fields'] as $field => $info) {
            $r = [!empty($info['required']) ? 'required' : 'nullable'];

            if ($info['type'] === 'number') {
                $r[] = !empty($info['integer']) ? 'integer' : 'numeric';
                $r[] = 'min:' . ($info['min'] ?? 0);
            }

            if ($info['type'] === 'date') {
                $r[] = 'date';
            }

            if (isset($info['options'])) {
                $r[] = Rule::in($info['options']);
            }

            if (!empty($info['unique'])) {
                $r[] = Rule::unique($table, $field)->ignore($id);
            }

            $rules[$field] = $r;
        }

        return $rules;
    }

    private function messages(): array
    {
        return [
            'required' => ':attribute wajib diisi.',
            'in'       => ':attribute tidak valid.',
            'numeric'  => ':attribute harus angka yang valid.',
            'integer'  => ':attribute harus angka yang valid.',
            'min'      => [
                'numeric' => ':attribute harus angka yang valid.',
            ],
            'date'     => 'Tanggal tidak valid.',
            'unique'   => 'Data sudah terdaftar. Periksa nilai yang harus unik.',
        ];
    }

    private function labels(array $cfg): array
    {
        return collect($cfg['fields'])->map(fn ($info) => $info['label'])->all();
    }

    public function index(Request $request, string $modul)
    {
        $cfg  = $this->cfg($modul);
        $cari = trim((string) $request->query('cari', ''));

        $query = $cfg['model']::query();

        if ($cari !== '') {
            $query->where(function ($q) use ($cfg, $cari) {
                foreach (array_keys($cfg['fields']) as $field) {
                    $q->orWhere($field, 'like', '%' . $cari . '%');
                }
            });
        }

        $data = $query->orderByDesc('id')->get();

        return view('cafe.index', compact('modul', 'cfg', 'cari', 'data'));
    }

    public function create(string $modul)
    {
        $cfg  = $this->cfg($modul);
        $item = null;

        return view('cafe.form', compact('modul', 'cfg', 'item'));
    }

    public function store(Request $request, string $modul)
    {
        $cfg  = $this->cfg($modul);
        $data = $request->validate($this->rules($cfg), $this->messages(), $this->labels($cfg));

        $cfg['model']::create($data);

        return redirect()->route('cafe.index', $modul)->with('pesan', 'Data berhasil disimpan.');
    }

    public function edit(string $modul, int $id)
    {
        $cfg  = $this->cfg($modul);
        $item = $cfg['model']::findOrFail($id);

        return view('cafe.form', compact('modul', 'cfg', 'item'));
    }

    public function update(Request $request, string $modul, int $id)
    {
        $cfg  = $this->cfg($modul);
        $item = $cfg['model']::findOrFail($id);
        $data = $request->validate($this->rules($cfg, $id), $this->messages(), $this->labels($cfg));

        $item->update($data);

        return redirect()->route('cafe.index', $modul)->with('pesan', 'Data berhasil disimpan.');
    }

    public function destroy(string $modul, int $id)
    {
        $cfg = $this->cfg($modul);
        $cfg['model']::findOrFail($id)->delete();

        return redirect()->route('cafe.index', $modul)->with('pesan', 'Data berhasil dihapus.');
    }
}
