<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        if ($this->session->userdata('email')) {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        }
    }

    public function index()
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer_grafik');
            $this->load->view('templates/footer');
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('templates/footer_grafik');
            $this->load->view('templates/footer');
        }
    }

    public function sejarah()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $query = "SELECT `user`.* , `sejarah`.*
                    FROM `user` JOIN `sejarah`
                      ON `user`.`id` = `sejarah`.`user_id`                                                            
            ";
        $data['sejarah'] = $this->db->query($query)->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/sejarah', $data);
        $this->load->view('templates/footer');
    }

    public function sejarahedit($id)
    {
        $data['title'] = 'Edit Data Sejarah';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required|trim');
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

        if ($this->form_validation->run() == false) {

            $query = "SELECT `user`.* , `sejarah`.*
                    FROM `user` JOIN `sejarah`
                    ON `user`.`id` = `sejarah`.`user_id` 
                    WHERE `sejarah`.`id` = $id                                                           
            ";
            $data['sejarah'] = $this->db->query($query)->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/sejarahedit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $judul = $this->input->post('judul');
            $deskripsi = $this->input->post('deskripsi');

            // check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/galeri/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // hapus gambar lama 
                    $old_image = $data['sejarah']['image'];
                    // if ($old_image != 'sejarah.jpg') {
                    unlink(FCPATH . 'assets/img/galeri/' . $old_image);
                    unlink(FCPATH . 'assets/img/galeri/thumbnail/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }


            $this->db->set('judul', $judul);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->where('id', $id);
            $this->db->update('sejarah');
            if ($upload_image) {
                $this->upload_image();
            }

            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/sejarah');
        }
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

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/lokasi', $data);
        $this->load->view('templates/footer');
    }

    public function lokasiedit($id)
    {
        $data['title'] = 'Edit Data lokasi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|trim');
        $this->form_validation->set_rules('desa', 'Desa', 'required|trim');
        $this->form_validation->set_rules('latitude', 'Latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'Longitude', 'required|trim');

        if ($this->form_validation->run() == false) {

            $query = "SELECT `user`.* , `lokasi`.*
                    FROM `user` JOIN `lokasi`
                    ON `user`.`id` = `lokasi`.`user_id`                                                            
                    ";
            $data['lokasi'] = $this->db->query($query)->row_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/lokasiedit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $provinsi = $this->input->post('provinsi');
            $kabupaten = $this->input->post('kabupaten');
            $kecamatan = $this->input->post('kecamatan');
            $desa = $this->input->post('desa');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');

            $this->db->set('provinsi', $provinsi);
            $this->db->set('kabupaten', $kabupaten);
            $this->db->set('kecamatan', $kecamatan);
            $this->db->set('desa', $desa);
            $this->db->set('latitude', $latitude);
            $this->db->set('longitude', $longitude);
            $this->db->where('id', $id);
            $this->db->update('lokasi');

            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/lokasi');
        }
    }

    public function pengunjung()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // $query = "SELECT `provinsi`.* , `pengunjung`.*
        //             FROM `provinsi` JOIN `pengunjung`
        //             ON `provinsi`.`id` = `pengunjung`.`provinsi_id`   
        //             ORDER BY `pengunjung`.`tanggal` ASC;                                                         
        //         ";
        // $data['pengunjung'] = $this->db->query($query)->result_array();

        // // var_dump($data['pengunjung']);
        // // die;

        // $this->load->view('templates/header', $data);
        // $this->load->view('templates/sidebar', $data);
        // $this->load->view('templates/topbar', $data);
        // $this->load->view('user/pengunjung', $data);
        // $this->load->view('templates/footer');




        $data['provinsi'] = $this->db->get('provinsi')->result_array();

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
        $this->form_validation->set_rules('tanggal_awal', 'Tanggal Awal', 'required');
        $this->form_validation->set_rules('tanggal_akhir', 'Tanggal Akhir', 'required');

        if ($this->form_validation->run() == false) {

            $data['pengunjung'] = $this->db->order_by('tanggal', 'ASC')->get('pengunjung')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengunjung', $data);
            $this->load->view('templates/footer');
        } else {
            $provinsi = $this->input->post('provinsi');
            $tanggal_awal = $this->input->post('tanggal_awal');
            $tanggal_akhir = $this->input->post('tanggal_akhir');

            $data_provinsi = $this->db->get_where('provinsi', ['id' => $provinsi])->row_array();
            $data['nama_provinsi'] = $data_provinsi['nama_provinsi'];

            if ($provinsi == 'All') {
                $data['pengunjung'] = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir])->result_array();
            } else {
                $data['pengunjung'] = $this->db->order_by('tanggal', 'ASC')->get_where('pengunjung', ['tanggal >=' => $tanggal_awal, 'tanggal <=' => $tanggal_akhir, 'provinsi_id' => $provinsi])->result_array();
            }

            $data['subtitle'] = 'Periode: ' . date('d F Y', strtotime($tanggal_awal)) . ' - ' .  date('d F Y', strtotime($tanggal_akhir));


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengunjung', $data);
            $this->load->view('templates/footer');
        }
    }

    public function pengunjungadd()
    {
        $data['title'] = 'Tambah Data Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required|trim');
        // $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|is_unique[pengunjung.tanggal]', [
        //     'is_unique' => 'Data tanggal ini sudah dimasukkan.'
        // ]);

        if ($this->form_validation->run() == false) {

            $data['provinsi'] = $this->db->get('provinsi')->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengunjungadd', $data);
            $this->load->view('templates/footer');
        } else {
            $provinsi = $this->input->post('provinsi');
            $jumlah = $this->input->post('jumlah');
            $tanggal = $this->input->post('tanggal');
            $bulan = date('F', strtotime($tanggal));
            $tahun = intval(date('Y', strtotime($tanggal)));
            $nama_provinsi = $this->db->get_where('provinsi', ['id' => $provinsi])->row_array()['nama_provinsi'];
            $data = [
                'provinsi_id' => $this->input->post('provinsi'),
                'nama_provinsi' => $nama_provinsi,
                'jumlah' => $this->input->post('jumlah'),
                'tanggal' => $this->input->post('tanggal'),
                'bulan' => $bulan,
                'tahun' => $tahun,
            ];

            $this->db->insert('pengunjung', $data);

            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/pengunjung');
        }
    }


    public function pengunjungedit($id)
    {
        $data['title'] = 'Edit Data Pengunjung';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('provinsi', 'Provinsi', 'required|trim');
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim');
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim');
        // $this->form_validation->set_rules('tanggal', 'Tanggal', 'required|trim|is_unique[pengunjung.tanggal]', [
        //     'is_unique' => 'Data tanggal ini sudah dimasukkan.'
        // ]);

        if ($this->form_validation->run() == false) {

            $data['provinsi'] = $this->db->get('provinsi')->result_array();
            $data['pengunjung'] = $this->db->get_where('pengunjung', ['id' => $id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/pengunjungedit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $provinsi = $this->input->post('provinsi');
            $jumlah = $this->input->post('jumlah');
            $tanggal = $this->input->post('tanggal');
            $bulan = date('F', strtotime($tanggal));
            $tahun = intval(date('Y', strtotime($tanggal)));
            $nama_provinsi = $this->db->get_where('provinsi', ['id' => $provinsi])->row_array()['nama_provinsi'];

            $this->db->set('provinsi_id', $provinsi);
            $this->db->set('nama_provinsi', $nama_provinsi);
            $this->db->set('jumlah', $jumlah);
            $this->db->set('tanggal', $tanggal);
            $this->db->set('bulan', $bulan);
            $this->db->set('tahun', $tahun);
            $this->db->where('id', $id);
            $this->db->update('pengunjung');

            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/pengunjung');
        }
    }

    public function pengunjungdelete($id)
    {

        $this->db->delete('pengunjung', ['id' => $id]);
        $this->session->set_flashdata('warning', 'Data berhasil dihapus');
        redirect('user/pengunjung');
    }

    public function galeri()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['galeri'] = $this->db->get('galeri')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/galeri', $data);
        $this->load->view('templates/footer');
    }

    public function galeridetail($id)
    {
        $data['title'] = 'Edit Data Galeri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['galeri'] = $this->db->get_where('galeri', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/galeridetail', $data);
        $this->load->view('templates/footer');
    }

    public function galeriedit($id)
    {
        $data['title'] = 'Edit Data Galeri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('deskripsi_galeri', 'Deskripsi Galeri', 'required|trim');
        $this->form_validation->set_rules('image', 'image', '');

        if ($this->form_validation->run() == false) {

            $data['galeri'] = $this->db->get_where('galeri', ['id' => $id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/galeriedit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi_galeri');
            // $image = $this->input->post('image');

            // check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/galeri/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // hapus gambar lama 
                    $old_image = $this->input->post('old_image');
                    // if ($old_image != 'sejarah.jpg') {
                    unlink(FCPATH . 'assets/img/galeri/' . $old_image);
                    unlink(FCPATH . 'assets/img/galeri/thumbnail/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                    $this->upload_image();
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $this->db->set('nama', $nama);
            $this->db->set('deskripsi', $deskripsi);
            // $this->db->set('image', $image);
            $this->db->where('id', $id);
            $this->db->update('galeri');



            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/galeri');
        }
    }

    public function galeridelete($id)
    {
        $galeri = $this->db->get_where('galeri', ['id' => $id])->row_array();
        $old_image = $galeri['image'];
        unlink(FCPATH . 'assets/img/galeri/' . $old_image);
        unlink(FCPATH . 'assets/img/galeri/thumbnail/' . $old_image);
        $this->db->delete('galeri', ['id' => $id]);
        $this->session->set_flashdata('warning', 'Data berhasil dihapus');
        redirect('user/galeri');
    }



    public function galeriadd()
    {
        $data['title'] = 'Edit Data Galeri';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('deskripsi_galeri', 'Deskripsi Galeri', 'required|trim');
        // $this->form_validation->set_rules('image', 'image', 'required');


        if ($this->form_validation->run() == false) {


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/galeriadd', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi_galeri');
            // $image = $this->input->post('image');

            // check jika ada gambar yang akan di upload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size'] = '2048';
                $config['upload_path'] = './assets/img/galeri/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    // hapus gambar lama 
                    // $old_image = $this->input->post('old_image');
                    // if ($old_image != 'sejarah.jpg') {
                    // unlink(FCPATH . 'assets/img/galeri/' . $old_image);
                    // unlink(FCPATH . 'assets/img/galeri/thumbnail/' . $old_image);
                    // }
                    $new_image = $this->upload->data('file_name');
                    // $this->db->set('image', $new_image);
                    $this->upload_image();
                } else {
                    echo $this->upload->display_errors();
                }
            }

            $data = [
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi_galeri'),
                'image' => $new_image,
            ];

            $this->db->insert('galeri', $data);



            $this->session->set_flashdata('success', 'Data berhasil ditambah');
            redirect('user/galeri');
        }
    }


    public function video()
    {

        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $data['video'] = $this->db->get('video')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/video', $data);
        $this->load->view('templates/footer');
    }

    public function videoadd()
    {
        $data['title'] = 'Edit Data Video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('deskripsi_video', 'Deskripsi video', 'required|trim');
        $this->form_validation->set_rules('video', 'video', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/videoadd', $data);
            $this->load->view('templates/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi_video');
            $video = $this->input->post('video');

            $data = [
                'nama' => $this->input->post('nama'),
                'deskripsi' => $this->input->post('deskripsi_video'),
                'video' => $video,
                'user_id' => $data['user']['id'],
            ];

            $this->db->insert('video', $data);

            $this->session->set_flashdata('success', 'Data berhasil ditambah');
            redirect('user/video');
        }
    }

    public function videoedit($id)
    {
        $data['title'] = 'Edit Data video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('deskripsi_video', 'Deskripsi video', 'required|trim');
        $this->form_validation->set_rules('video', 'video', '');

        if ($this->form_validation->run() == false) {

            $data['video'] = $this->db->get_where('video', ['id' => $id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/videoedit', $data);
            $this->load->view('templates/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi_video');
            $video = $this->input->post('video');


            $this->db->set('nama', $nama);
            $this->db->set('deskripsi', $deskripsi);
            $this->db->set('video', $video);
            $this->db->set('user_id', $data['user']['id']);
            $this->db->where('id', $id);
            $this->db->update('video');



            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/video');
        }
    }

    public function videodelete($id)
    {
        $this->db->delete('video', ['id' => $id]);
        $this->session->set_flashdata('warning', 'Data berhasil dihapus');
        redirect('user/video');
    }

    public function videodetail($id)
    {
        $data['title'] = 'Detail Data video';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['video'] = $this->db->get_where('video', ['id' => $id])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/videodetail', $data);
        $this->load->view('templates/footer');
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitas', $data);
            $this->load->view('templates/footer');
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

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitas', $data);
            $this->load->view('templates/footer');
        }
    }

    public function fasilitasdata()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['jenis_fasilitas'] = $this->db->get('jenis_fasilitas')->result_array();

        $this->form_validation->set_rules('jenis_fasilitas', 'Jenis Fasilitas', 'required');

        if ($this->form_validation->run() == false) {
            $query = "SELECT `fasilitas`.* , `jenis_fasilitas`.`nama_fasilitas`
                        FROM `fasilitas` JOIN `jenis_fasilitas`
                        ON `fasilitas`.`jenis_fasilitas_id` = `jenis_fasilitas`.`id`                                                                                                         
                    ";
            $data['fasilitas'] = $this->db->query($query)->result_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitasdata', $data);
            $this->load->view('templates/footer');
        } else {
            $jenis_fasilitas = $this->input->post('jenis_fasilitas');

            $query = "SELECT `fasilitas`.* , `jenis_fasilitas`.`nama_fasilitas`
                        FROM `fasilitas` JOIN `jenis_fasilitas`
                        ON `fasilitas`.`jenis_fasilitas_id` = `jenis_fasilitas`.`id`   
                        WHERE `fasilitas`.`jenis_fasilitas_id` = $jenis_fasilitas                                                                                                      
                    ";
            $data['fasilitas'] = $this->db->query($query)->result_array();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitasdata', $data);
            $this->load->view('templates/footer');
        }
    }

    public function fasilitasadd()
    {
        $data['title'] = 'Edit Data fasilitas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis_fasilitas'] = $this->db->get('jenis_fasilitas')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jenis_fasilitas', 'jenis fasilitas', 'required|trim');
        $this->form_validation->set_rules('latitude', 'latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'longitude', 'required|trim');


        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitasadd', $data);
            $this->load->view('templates/footer');
        } else {
            $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
            $nama = $this->input->post('nama');
            $deskripsi = $this->input->post('deskripsi_fasilitas');
            $fasilitas = $this->input->post('fasilitas');

            $data = [
                'nama' => $this->input->post('nama'),
                'jenis_fasilitas_id' => $this->input->post('jenis_fasilitas'),
                'latitude' => $this->input->post('latitude'),
                'longitude' => $this->input->post('longitude'),
                'user_id' => $data['user']['id'],
            ];

            $this->db->insert('fasilitas', $data);

            $this->session->set_flashdata('success', 'Data berhasil ditambah');
            redirect('user/fasilitasdata');
        }
    }

    public function fasilitasedit($id)
    {
        $data['title'] = 'Edit Data fasilitas';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jenis_fasilitas'] = $this->db->get('jenis_fasilitas')->result_array();

        $this->form_validation->set_rules('nama', 'nama', 'required|trim');
        $this->form_validation->set_rules('jenis_fasilitas', 'jenis fasilitas', 'required|trim');
        $this->form_validation->set_rules('latitude', 'latitude', 'required|trim');
        $this->form_validation->set_rules('longitude', 'longitude', 'required|trim');


        if ($this->form_validation->run() == false) {

            $data['fasilitas'] = $this->db->get_where('fasilitas', ['id' => $id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/fasilitasedit', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $jenis_fasilitas = $this->input->post('jenis_fasilitas');
            $latitude = $this->input->post('latitude');
            $longitude = $this->input->post('longitude');



            $this->db->set('nama', $nama);
            $this->db->set('jenis_fasilitas_id', $jenis_fasilitas);
            $this->db->set('latitude', $latitude);
            $this->db->set('longitude', $longitude);
            $this->db->set('user_id', $data['user']['id']);
            $this->db->where('id', $id);
            $this->db->update('fasilitas');



            $this->session->set_flashdata('success', 'Data berhasil diubah');
            redirect('user/fasilitasdata');
        }
    }

    public function fasilitasdelete($id)
    {
        $this->db->delete('fasilitas', ['id' => $id]);
        $this->session->set_flashdata('warning', 'Data berhasil dihapus');
        redirect('user/fasilitasdata');
    }


    public function upload_image()
    {
        $config['upload_path'] = './assets/img/galeri/thumbnail/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan        

        $this->upload->initialize($config);

        if (!empty($_FILES['image']['name'])) {

            if ($this->upload->do_upload('image')) {
                $gbr = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './assets/img/galeri/' . $gbr['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                // $config['width'] = 350;
                // $config['height'] = 350;
                $config['width'] = 384;
                $config['height'] = 256;
                $config['new_image'] = './assets/img/galeri/thumbnail/' . $gbr['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
            }
        } else {
            //            
        }
    }
}
