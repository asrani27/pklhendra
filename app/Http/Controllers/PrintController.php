<?php

namespace App\Http\Controllers;

use App\Models\T_jkn;
use App\Models\T_spj;
use Illuminate\Http\Request;
use App\Models\T_bku_rekening;
use App\Models\T_bku_rekening_detail;
use PhpOffice\PhpWord\TemplateProcessor;

class PrintController extends Controller
{
    public function spj($id)
    {
        $data = T_spj::find($id);
        $detail = $data->detail;
        $penerimaan = $data->penerimaan;
        $sp2d = $penerimaan->where('jenis', 'sp2d')->first();
        $pp = $penerimaan->where('jenis', 'pp')->first();
        $ppn = $penerimaan->where('jenis', 'ppn')->first();
        $pph21 = $penerimaan->where('jenis', 'pph21')->first();
        $pph22 = $penerimaan->where('jenis', 'pph22')->first();
        $pph23 = $penerimaan->where('jenis', 'pph23')->first();
        $pph4 = $penerimaan->where('jenis', 'pph4')->first();
        $lain = $penerimaan->where('jenis', 'lain')->first();
        return view('staf.transaksi.spj.print', compact('data', 'id', 'detail', 'penerimaan', 'sp2d', 'pp', 'ppn', 'pph21', 'pph22', 'pph23', 'pph4', 'lain'));
    }

    public function tt($id)
    {
        $data = T_bku_rekening_detail::find($id);
        
        return view('staf.transaksi.tt.print', compact('data'));
    }
    public function bku($id)
    {
        $data = T_spj::find($id);
        $rekening = T_bku_rekening::where('t_spj_id', $id)->get();
        $total = T_bku_rekening_detail::where('t_spj_id', $id)->get();
        return view('admin.transaksi.bku.print', compact('data', 'id', 'rekening', 'total'));
    }
    public function npd($id)
    {
        $data = T_spj::find($id);
        $detail = $data->detail;
        $detail->map(function ($item) {
            $item->aps = $item->ls_gaji1 + $item->ls_bj1 + $item->gu1;
            $item->psi = $item->ls_gaji2 + $item->ls_bj2 + $item->gu2;
            $item->sisa_npd = $item->ja - ($item->aps + $item->psi);
            return $item;
        });

        return view('admin.transaksi.npd.print', compact('id', 'data', 'detail'));
    }

    public function sptjb($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('admin.transaksi.sptjb.print', compact('id', 'data', 'ttd'));
    }
    public function kwitansi($id)
    {
        $ttd = T_spj::find($id);
        $data = T_bku_rekening_detail::where('t_spj_id', $id)->where('pajak', 0)->get();
        return view('staf.laporan.detailkwitansi', compact('id', 'data', 'ttd'));
    }

    public function kuitansi11($id)
    {
        $data = T_bku_rekening_detail::find($id);

        $ttd = T_spj::find($data->t_spj_id);
        return view('admin.transaksi.kuitansi.print', compact('id', 'data', 'ttd'));
    }
    public function jknCetak($id)
    {
        $spj = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->get();
        $data->map(function ($item, $key) {
            $item->diterima = $item->potongan * $item->jumlah;
            return $item;
        });
        return view('staf.transaksi.jkn.print', compact('data', 'id', 'spj'));
    }
    public function jkkCetak($id)
    {
        $spj = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->get();
        return view('staf.transaksi.jkk.print', compact('data', 'id', 'spj'));
    }
    public function jkmCetak($id)
    {
        $spj = T_spj::find($id);
        $data = T_jkn::where('t_spj_id', $id)->get();
        return view('staf.transaksi.jkm.print', compact('data', 'id', 'spj'));
    }

    public function nodin($id)
    {
        $templateProcessor = new TemplateProcessor('notadinas.docx');

        $spj = T_spj::find($id);
        $detail = T_spj::find($id)->detail;
        $detail->map(function ($item) {
            $item->aps = $item->ls_gaji1 + $item->ls_bj1 + $item->gu1;
            $item->psi = $item->ls_gaji2 + $item->ls_bj2 + $item->gu2;
            $item->sisa_npd = $item->ja - ($item->aps + $item->psi);
            return $item;
        });
        $templateProcessor->setValues([
            'bulan' => $spj->bulan,
            'tahun' => $spj->tahun,
            'nilai' => number_format($detail->sum('psi')),
            'terbilang' => terbilang($detail->sum('psi')) . ' rupiah',
        ]);

        header("Content-Disposition: attachment; filename=notadinas.docx");

        $templateProcessor->saveAs('php://output');
    }
}
