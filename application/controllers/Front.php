<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{
	public function index()
	{
		$data['title'] = 'Pantai Nyanyi';
		$data['galeri'] = $this->db->limit(6)->get('galeri')->result_array();

		$query = "SELECT `user`.* , `lokasi`.*
					FROM `user` JOIN `lokasi`
					ON `user`.`id` = `lokasi`.`user_id`                                                            
					";
		$data['lokasi'] = $this->db->query($query)->row_array();





		// fasilitas
		// 1 = villa
		$jenis_fasilitas = 1;

		$query = "SELECT `nama`, `latitude`, `longitude`, `id`
					FROM `fasilitas`
					WHERE `fasilitas`.`jenis_fasilitas_id` = $jenis_fasilitas   
					";
		$locations = $this->db->query($query)->result_array();

		$qqq = [];
		foreach ($locations as $l) {
			$asd = [];
			array_push($asd, $l['nama']);
			array_push($asd, floatval($l['latitude']));
			array_push($asd, floatval($l['longitude']));
			array_push($asd, $l['id']);
			array_push($qqq, $asd);
		}

		$data['locations'] = json_encode($qqq);




        // pengunjung
        $periode = 'Harian';

        $query_date = date('Y-m-d');
        $tanggal_awal = date('Y-m-01', strtotime($query_date));
        $tanggal_akhir = date('Y-m-t', strtotime($query_date));

        if ($periode == 'Harian') {
            $pengunjung = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir])->result_array();
            $tanggal_pengunjung = [];
            $jumlah_pengunjung = [];
            foreach ($pengunjung as $p) {
                array_push($tanggal_pengunjung, date('d M Y', strtotime($p['tanggal'])));
                array_push($jumlah_pengunjung, intval($p['jumlah']));
            }

            $data['tanggal_pengunjung'] = json_encode($tanggal_pengunjung);
            $data['jumlah_pengunjung'] = json_encode($jumlah_pengunjung);

            $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));
            $data['periode'] = $periode;
        }

        // video
        $data['video'] = $this->db->get('video')->row_array();
        

        $this->load->view('templates_front/header');
        $this->load->view('front/index', $data);
        $this->load->view('templates_front/footer_grafik');
        $this->load->view('templates_front/footer');
	}
    public function galeri()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['galeri'] = $this->db->get('galeri')->result_array();

        $this->load->view('templates_front/header');
        $this->load->view('front/galeri', $data);        
        $this->load->view('templates_front/footer');
    }
    
    public function lokasi()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT `user`.* , `lokasi`.*
                    FROM `user` JOIN `lokasi`
                      ON `user`.`id` = `lokasi`.`user_id`                                                            
            ";
        $data['lokasi'] = $this->db->query($query)->row_array();

        $this->load->view('templates_front/header');
        $this->load->view('front/lokasi', $data);        
        $this->load->view('templates_front/footer');
    }

    public function fasilitas()
    {
        $data['title'] = 'Detail Data Fasilitas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $xxx = [
        //     ['Bondi Beach', -33.890542, 151.274856, 1],
        //     ['Coogee Beach', -33.923036, 151.259052, 2],
        //     ['Cronulla Beach', -34.028249, 151.157507, 3],
        //     ['Manly Beach', -33.80010128657071, 151.28747820854187, 4],
        //     ['Maroubra Beach', -33.950198, 151.259302, 5]
        // ];
        $data['jenis_fasilitas'] = $this->db->get('jenis_fasilitas')->result_array();
        $this->form_validation->set_rules('jenis_fasilitas', 'Jenis Fasilitas', 'required');

        if ($this->form_validation->run() == false) {
            
            // 1 = villa
            $jenis_fasilitas = 1;

            $query = "SELECT `nama`, `latitude`, `longitude`, `id`
                        FROM `fasilitas`
                        WHERE `fasilitas`.`jenis_fasilitas_id` = $jenis_fasilitas   
                        ";
            $locations = $this->db->query($query)->result_array();

            $qqq = [];
            foreach ($locations as $l) {
                $asd = [];
                array_push($asd, $l['nama']);
                array_push($asd, floatval($l['latitude']));
                array_push($asd, floatval($l['longitude']));
                array_push($asd, $l['id']);
                array_push($qqq, $asd);
            }

            $data['locations'] = json_encode($qqq);

            $this->load->view('templates_front/header');
            $this->load->view('front/fasilitas', $data);        
            $this->load->view('templates_front/footer');
        } else {
            $jenis_fasilitas = $this->input->post('jenis_fasilitas');

            $query = "SELECT `nama`, `latitude`, `longitude`, `id`
                        FROM `fasilitas`
                        WHERE `fasilitas`.`jenis_fasilitas_id` = $jenis_fasilitas   
                        ";
            $locations = $this->db->query($query)->result_array();

            $qqq = [];
            foreach ($locations as $l) {
                $asd = [];
                array_push($asd, $l['nama']);
                array_push($asd, floatval($l['latitude']));
                array_push($asd, floatval($l['longitude']));
                array_push($asd, $l['id']);
                array_push($qqq, $asd);
            }

            $data['locations'] = json_encode($qqq);

            $this->load->view('templates_front/header');
            $this->load->view('front/fasilitas', $data);        
            $this->load->view('templates_front/footer');
        }
    }

    public function pengunjung()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['provinsi'] = $this->db->get('provinsi')->result_array();


        $this->form_validation->set_rules('periode', 'Periode', 'required');
        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == false) {
            $periode = 'Harian';

            $query_date = date('Y-m-d');
            $tanggal_awal = date('Y-m-01', strtotime($query_date));
            $tanggal_akhir = date('Y-m-t', strtotime($query_date));

            if ($periode == 'Harian') {
                $pengunjung = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir])->result_array();
                $tanggal_pengunjung = [];
                $jumlah_pengunjung = [];
                foreach ($pengunjung as $p) {
                    array_push($tanggal_pengunjung, date('d M Y', strtotime($p['tanggal'])));
                    array_push($jumlah_pengunjung, intval($p['jumlah']));
                }

                $data['tanggal_pengunjung'] = json_encode($tanggal_pengunjung);
                $data['jumlah_pengunjung'] = json_encode($jumlah_pengunjung);

                $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));
                $data['periode'] = $periode;
            }
            
            $this->load->view('templates_front/header');
            $this->load->view('front/pengunjung', $data);        
            $this->load->view('templates_front/footer_grafik');
            $this->load->view('templates_front/footer');
            
        } else {
            $periode = $this->input->post('periode');
            $provinsi = $this->input->post('provinsi');
            $tanggal_awal = $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');

            $data_provinsi = $this->db->get_where('provinsi', ['id' => $provinsi])->row_array();
            $data['nama_provinsi'] = $data_provinsi['nama_provinsi'];

            if ($periode == 'Harian') {
                if ($provinsi == 'All') {
                    $pengunjung = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir])->result_array();
                } else {
                    $pengunjung = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir, 'provinsi_id' => $provinsi])->result_array();
                }

                $tanggal_pengunjung = [];
                $jumlah_pengunjung = [];
                foreach ($pengunjung as $p) {
                    array_push($tanggal_pengunjung, date('d M Y', strtotime($p['tanggal'])));
                    array_push($jumlah_pengunjung, intval($p['jumlah']));
                }

                $data['tanggal_pengunjung'] = json_encode($tanggal_pengunjung);
                $data['jumlah_pengunjung'] = json_encode($jumlah_pengunjung);

                $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));
            }


            if ($periode == 'Bulanan') {
                if ($provinsi == 'All') {
                    $query = "SELECT SUM(jumlah),bulan,tahun
                            FROM `pengunjung` 
                            WHERE `tanggal` >= '$tanggal_awal' AND `tanggal` <= '$tanggal_akhir' 
                            GROUP BY bulan
                            ORDER BY bulan DESC";
                    $pengunjung = $this->db->query($query)->result_array();
                } else {
                    $query = "SELECT SUM(jumlah),bulan,tahun,provinsi_id
                            FROM `pengunjung` 
                            WHERE `tanggal` >= '$tanggal_awal' AND `tanggal` <= '$tanggal_akhir' AND `provinsi_id` = $provinsi
                            GROUP BY bulan, provinsi_id 
                            ORDER BY bulan DESC";
                    $pengunjung = $this->db->query($query)->result_array();
                }
                // var_dump($pengunjung);
                // die;
                $tanggal_pengunjung = [];
                $jumlah_pengunjung = [];
                foreach ($pengunjung as $p) {
                    array_push($tanggal_pengunjung, $p['bulan']);
                    array_push($jumlah_pengunjung, intval($p['SUM(jumlah)']));
                }
                $data['tanggal_pengunjung'] = json_encode($tanggal_pengunjung);
                $data['jumlah_pengunjung'] = json_encode($jumlah_pengunjung);

                $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));
            }

            if ($periode == 'Tahunan') {
                if ($provinsi == 'All') {
                    $query = "SELECT SUM(jumlah),bulan,tahun 
                            FROM `pengunjung` 
                            WHERE `tanggal` >= '$tanggal_awal' AND `tanggal` <= '$tanggal_akhir' 
                            GROUP BY tahun
                            ORDER BY tahun ASC";
                    $pengunjung = $this->db->query($query)->result_array();
                } else {
                    $query = "SELECT SUM(jumlah),bulan,tahun,provinsi_id
                            FROM `pengunjung` 
                            WHERE `tanggal` >= '$tanggal_awal' AND `tanggal` <= '$tanggal_akhir' AND `provinsi_id` = $provinsi
                            GROUP BY tahun, provinsi_id 
                            ORDER BY tahun ASC";
                    $pengunjung = $this->db->query($query)->result_array();
                }
                // var_dump($pengunjung);
                // die;
                $tanggal_pengunjung = [];
                $jumlah_pengunjung = [];
                foreach ($pengunjung as $p) {
                    array_push($tanggal_pengunjung, $p['tahun']);
                    array_push($jumlah_pengunjung, intval($p['SUM(jumlah)']));
                }
                $data['tanggal_pengunjung'] = json_encode($tanggal_pengunjung);
                $data['jumlah_pengunjung'] = json_encode($jumlah_pengunjung);

                $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));
            }


            $data['periode'] = $periode;

            $this->load->view('templates_front/header');
            $this->load->view('front/pengunjung', $data);        
            $this->load->view('templates_front/footer_grafik');
            $this->load->view('templates_front/footer');
        }
    }

}
