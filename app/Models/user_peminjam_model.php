<?php

namespace App\Models;

use CodeIgniter\Model;

class user_peminjam_model extends Model
{
    protected $table      = 'user_peminjam';
    protected $primaryKey = 'peminjam_id';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['peminjam_nama', 'peminjam_slug', 'peminjam_hp', 'peminjam_email', 'peminjam_username', 'peminjam_password', 'peminjam_status',];

    protected $useTimestamps = true;

    public function getUserPeminjam($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }

        return $this->where(['peminjam_slug' => $slug])->first();
    }

    public function getRiwayatPenambahanAkun()
    {
        return $this->select('peminjam_id, peminjam_nama, peminjam_username, peminjam_email, peminjam_status, created_at')
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }
}
