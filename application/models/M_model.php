<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_model extends CI_Model
{
    public function KontingenData()
    {
        return $this->db->get('kontingen_data')->result_array();
    }

    public function proses_tambah_data()
    {
    	$data = [

    		"kontingen_nama" => $this->input->post('kontingen_nama', true),
    		"kontingen_manajer" => $this->input->post('kontingen_manajer', true),
    		"kontingen_ket" => $this->input->post('kontingen_ket', true),
    	];

    	$this->db->insert('kontingen_data', $data);
    }

    public function hapus_data($kontingen_id)
    {
        $this->db->where('kontingen_id' ,$kontingen_id);
        $this->db->delete('kontingen_data');
    }

    public function ambil_id_kontingen($kontingen_id)
    {
        return $this->db->get_where('kontingen_data', ['kontingen_id' => $kontingen_id])->row_array();
    }

    public function proses_edit_data()
    {
        $data = [
            "kontingen_nama" => $this->input->post('kontingen_nama'),
            "kontingen_manajer" => $this->input->post('kontingen_manajer'),
            "kontingen_ket" => $this->input->post('kontingen_ket'),
        ];

        $this->db->where('kontingen_id', $this->input->post('kontingen_id'));
        $this->db->update('kontingen_data' , $data);
    }

    public function CaborData()
    {
       $this->db->select('*');
       $this->db->from('cabor_data');
       $this->db->order_by('cabor_nama', 'ASC');
       return $this->db->get()->result_array();
   }

   public function lokasidata()
   {
    $this->db->select('*');
    $this->db->from('lokasi_data');
    $this->db->order_by('lokasi_nama', 'ASC');
    return $this->db->get()->result_array();
}

public function lokasicabor($cabor_id=0)
{
    $this->db->select('lokasi_data.*, cabor_data.*');
    $this->db->from('lokasi_data');
    $this->db->join('cabor_data','cabor_data.cabor_id=lokasi_data.cabor_id');
        // $this->db->join('kontingen_data','kontingen_data.kontingen_id=lokasi_data.kontingen_id');
    $this->db->where('lokasi_data.cabor_id', $cabor_id);
        // $this->db->order_by('medali_data.medali_id', 'ASC');
        // $this->db->order_by('kontingen_data.kontingen_nama', 'ASC');
    return $this->db->get()->result_array();
}

public function cabordetail($cabor_id=0)
{
    $this->db->select('*');
    $this->db->from('cabor_data');
    $this->db->where('cabor_id' ,$cabor_id);
    return $this->db->get()->row_array();
}

public function proses_tambah_cabor()
{
    $data = [

        "cabor_nama" => $this->input->post('cabor_nama', true),
        "cabor_ket" => $this->input->post('cabor_ket', true),
    ];

    $this->db->insert('cabor_data', $data);
}

public function hapus_cabor($cabor_id)
{
    $this->db->where('cabor_id' ,$cabor_id);
    $this->db->delete('cabor_data');
}

public function ambil_id_cabor($cabor_id)
{
    return $this->db->get_where('cabor_data', ['cabor_id' => $cabor_id])->row_array();
}

public function proses_edit_cabor()
{
    $data = [
        "cabor_nama" => $this->input->post('cabor_nama'),
        "cabor_ket" => $this->input->post('cabor_ket'),
    ];

    $this->db->where('cabor_id', $this->input->post('cabor_id'));
    $this->db->update('cabor_data' , $data);
}

public function EventData()
{
    $this->db->select('*');
    $this->db->from('event_data');
    $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');
    $this->db->order_by('cabor_nama', 'ASC');
    $this->db->order_by('event_nama', 'ASC');
    return $this->db->get()->result_array();
}

public function eventdetail($event_id=0)
{
    $this->db->select('*');
    $this->db->from('event_data');
    $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');
    $this->db->where('event_id' ,$event_id);
    return $this->db->get()->row_array();
}

public function medaliref()
{
    $this->db->select('*');
    $this->db->from('medali_ref');
    return $this->db->get()->result_array();
}

public function proses_tambahevent()
{
    $this->db->select('*');
    $this->db->from('cabor_data');
    $query = $this->db->get();
    return $query->result_array();
}

public function proses_tambah_event()
{
    $data = [

        "event_nama" => $this->input->post('event_nama', true),
        "cabor_id" => $this->input->post('cabor_id', true),
        "event_start" => $this->input->post('event_start', true),
        "event_end" => $this->input->post('event_end', true),
    ];

    $this->db->insert('event_data', $data);
}

public function hapus_event($event_id)
{
    $this->db->where('event_id' ,$event_id);
    $this->db->delete('event_data');
}

public function ambil_id_event($event_id)
{
    return $this->db->get_where('event_data', ['event_id' => $event_id])->row_array();
}

public function proses_edit_event()
{
    $data = [
        "event_nama" => $this->input->post('event_nama'),
        "event_start" => $this->input->post('event_start'),
        "event_end" => $this->input->post('event_end'),
    ];

    $this->db->where('event_id', $this->input->post('event_id'));
    $this->db->update('event_data' , $data);
}

public function MedaliData()
{
    $this->db->select('medali_data.*, medali_ref.*, kontingen_data.*, event_data.*, cabor_data.*');
    $this->db->from('medali_data');
    $this->db->join('medali_ref','medali_ref.medali_id=medali_data.medali_id');
    $this->db->join('kontingen_data','kontingen_data.kontingen_id=medali_data.kontingen_id');
    $this->db->join('event_data','event_data.event_id=medali_data.event_id');
    $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');
    return $this->db->get()->result_array();
}

public function medalievent($event_id=0)
{
    $this->db->select('medali_data.*, medali_ref.*, kontingen_data.*, event_data.*, cabor_data.*');
    $this->db->from('medali_data');
    $this->db->join('medali_ref','medali_ref.medali_id=medali_data.medali_id');
    $this->db->join('kontingen_data','kontingen_data.kontingen_id=medali_data.kontingen_id');
    $this->db->join('event_data','event_data.event_id=medali_data.event_id');
    $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');
    $this->db->where('medali_data.event_id', $event_id);
    $this->db->order_by('medali_data.medali_id', 'ASC');
    $this->db->order_by('kontingen_data.kontingen_nama', 'ASC');
    return $this->db->get()->result_array();
}

public function proses_tambahmedali()
{
    $this->db->select('*');
    $this->db->from('medali_ref, kontingen_data, event_data');
    $query = $this->db->get();
    return $query->result_array();
}

public function proses_tambah_medali()
{
    $data = [

        "medali_id" => $this->input->post('medali_id', true),
        "kontingen_id" => $this->input->post('kontingen_id', true),
        "event_id" => $this->input->post('event_id', true),
        "nama_atlet" => $this->input->post('nama_atlet', true),
    ]; 

    $this->db->insert('medali_data', $data);
    $namaMedali = $this->namaMedali($this->input->post('medali_id', true));
    $namaKontingen = $this->namaKontingen($this->input->post('kontingen_id', true));
    $namaEvent = $this->namaEvent($this->input->post('event_id', true));
    $namaCabor = $this->namaCabor($this->input->post('event_id', true));
    $this->M_model->kirimPesan('medali #'.$namaMedali.' kontingen #'. $namaKontingen.' cabang olahraga '.$namaCabor. ' ('.$namaEvent.') an. '.$this->input->post('nama_atlet', true));


    $this->getRekap();
}



public function namaMedali($medali_id=0) {
 $this->db->select('medali_ref.medali_nama');
 $this->db->where('medali_ref.medali_id', $medali_id);
 $this->db->from('medali_ref');
 $query = $this->db->get();
 $result = $query->row_array();
 return $result['medali_nama'];    

}

public function namaKontingen($kontingen_id=0) {
 $this->db->select('kontingen_data.kontingen_nama');
 $this->db->where('kontingen_data.kontingen_id', $kontingen_id);
 $this->db->from('kontingen_data');
 $query = $this->db->get();
 $result = $query->row_array();
 return $result['kontingen_nama'];    

}

public function namaEvent($event_id=0) {
 $this->db->select('event_data.event_nama');
 $this->db->where('event_data.event_id', $event_id);
 $this->db->from('event_data');
 $query = $this->db->get();
 $result = $query->row_array();
 return $result['event_nama'];    

}

public function namaCabor($event_id=0) {
 $this->db->select('*');
 $this->db->from('event_data');
 $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');
// $this->db->join('cabor_data','cabor_data.cabor_id=event_data.cabor_id');

 $this->db->where('event_data.event_id', $event_id);
 $query = $this->db->get();
 $result = $query->row_array();
 return $result['cabor_nama'];    

}

public function hapus_medali($id)
{
    $this->db->where('id' ,$id);
    $this->db->delete('medali_data');
}

    // public function medaliedit($id)
    // {
    //     $this->db->select('*');
    //     $this->db->from('medali_data');
    //     $this->db->join('medali_ref','medali_ref.medali_id=medali_data.medali_id');
    //     $this->db->join('kontingen_data','kontingen_data.kontingen_id=medali_data.kontingen_id');
    //      return $this->db->get()->result_array();
    // }

public function proses_edit_medali($id=0)
{
    $data = [
        "medali_id" => $this->input->post('medali_id'),
        "kontingen_id" => $this->input->post('kontingen_id'),
        "event_id" => $this->input->post('event_id'),
        "nama_atlet" => $this->input->post('nama_atlet'),
    ];

    $this->db->where('id', $this->input->post('id'));
    $this->db->update('medali_data' , $data);
}

public function RekapData()
{
    $query = $this->db->query("
        SELECT
        A.*,
        (SELECT count(B.medali_id)
        from medali_data B
        WHERE B.kontingen_id=
        A.kontingen_id
        AND B.medali_id=1
        ) as emas,

        (SELECT count(C.medali_id)
        from medali_data C
        WHERE C.kontingen_id=
        A.kontingen_id
        AND C.medali_id=2
        ) as perak,

        (SELECT count(D.medali_id)
        from medali_data D
        WHERE D.kontingen_id=
        A.kontingen_id
        AND D.medali_id=3
        ) as perunggu

        FROM
        kontingen_data A
        ORDER BY
        emas DESC, perak DESC, perunggu DESC
        ");
    return $query->result_array();
}

public function uraitanggal($event_start=0, $event_end=0)
{
    $start_tgl=date('d', strtotime($event_start));
    $start_bln=date('n', strtotime($event_start));
    $start_thn=date('Y', strtotime($event_start)); 

    $end_tgl=date('d', strtotime($event_end));
    $end_bln=date('n', strtotime($event_end));
    $end_thn=date('Y', strtotime($event_end));

    if ($start_bln==$end_bln AND $start_thn==$end_thn) {
        $urai=$start_tgl." - ".$end_tgl." ".$this->namabulan($start_bln)
        ." ".$start_thn;
    }
    elseif ($start_thn==$end_thn) {
        $urai=$start_tgl." ".$this->namabulan($start_bln)." - ".$end_tgl." ".$this->namabulan($end_bln)." ".$end_thn;
    }
    else {
        $urai=$start_tgl." ".$this->namabulan($start_bln)." ".$start_thn." - ".$end_tgl." ".$this->namabulan($end_bln)." ".$end_thn;
    }
    return $urai;
}

public function namabulan($angkabulan=0)
{
        // $bulan = array(1 => "Januari",2 => "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
        // $split = explode('-', $bulan);
        // return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

    $namabulan[1]="Januari";
    $namabulan[2]="Februari";
    $namabulan[3]="Maret";
    $namabulan[4]="April";
    $namabulan[5]="Mei";
    $namabulan[6]="Juni";
    $namabulan[7]="Juli";
    $namabulan[8]="Agustus";
    $namabulan[9]="September";
    $namabulan[10]="Oktober";
    $namabulan[11]="November";
    $namabulan[12]="Desember";

    return $namabulan[$angkabulan];
}

public function proses_tambah_lokasi()
{
    $data = [

        "lokasi_nama" => $this->input->post('lokasi_nama', true),
        "lokasi_long" => $this->input->post('lokasi_long', true),
        "lokasi_lat" => $this->input->post('lokasi_lat', true),
        "cabor_id" => $this->input->post('cabor_id', true),
        "kontingen_id" => $this->input->post('kontingen_id', true),
    ]; 

    $this->db->insert('lokasi_data', $data);
}

public function hapus_lokasi($lokasi_id=0)
{
    $this->db->where('lokasi_id' ,$lokasi_id);
    $this->db->delete('lokasi_data');
}

public function proses_edit_lokasi($lokasi_id=0)
{
    $data = [
        "lokasi_nama" => $this->input->post('lokasi_nama'),
        "lokasi_long" => $this->input->post('lokasi_long'),
        "lokasi_lat" => $this->input->post('lokasi_lat'),
    ];

    $this->db->where('lokasi_id', $this->input->post('lokasi_id'));
    $this->db->update('lokasi_data' , $data);
}

public function kirimPesan($pesan='') {
    $data = [
      'text' =>$pesan,
      'chat_id' => TELEGRAM_ID 
  ];

   // print_r($data);
  file_get_contents("https://api.telegram.org/bot".TELEGRAM_TOKEN."/sendMessage?" . http_build_query($data) );
}

public function getRekap() {
        $pesan = 'rekapitulasi medali';
        $rekap = $this->M_model->RekapData();
        $no = 1;
        foreach($rekap as $rkp): 

            $pesan = $pesan."\r\n".$no++.'. '. $rkp['kontingen_nama'].' | '. $rkp['emas'].' emas | '.$rkp['perak'].' perak | '.$rkp['perunggu'].' perunggu';
        endforeach;
    $this->M_model->kirimPesan($pesan);

    }
}
