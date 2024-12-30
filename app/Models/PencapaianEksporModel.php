<?php

namespace App\Models;

use CodeIgniter\Model;

class PencapaianEksporModel extends Model
{
    protected $table = 'pencapaian_ekspor'; // Nama tabel di database
    protected $primaryKey = 'id'; // Primary key tabel

    // Kolom yang dapat diisi secara massal
    protected $allowedFields = [
        'user_id_ekspor',
        'tanggal_ekspor',
        'deskripsi',
        'bukti_gambar',
        'status_verifikasi',
        'created_at',
        'updated_at',
    ];

    // Mengaktifkan fitur otomatis untuk timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at'; // Kolom untuk tanggal pembuatan
    protected $updatedField = 'updated_at'; // Kolom untuk tanggal pembaruan

    // Validasi
    protected $validationRules = [
        'user_id_ekspor' => 'required|integer',
        'tanggal_ekspor' => 'required|valid_date[Y-m-d]',
        'deskripsi'      => 'permit_empty|string',
        'bukti_gambar'   => 'permit_empty|string|max_length[255]',
        'status_verifikasi' => 'in_list[pending,accepted,rejected]',
    ];

    protected $validationMessages = [
        'user_id_ekspor' => [
            'required' => 'User ID ekspor harus diisi.',
            'integer'  => 'User ID ekspor harus berupa angka.',
        ],
        'tanggal_ekspor' => [
            'required'    => 'Tanggal ekspor harus diisi.',
            'valid_date'  => 'Format tanggal ekspor tidak valid (gunakan Y-m-d).',
        ],
        'status_verifikasi' => [
            'in_list' => 'Status verifikasi harus berupa: pending, accepted, atau rejected.',
        ],
    ];

    /**
     * Mengambil data pencapaian ekspor dengan detail pengguna.
     *
     * @param int|null $id
     * @return array|null
     */
    public function getWithUserDetails($id = null)
    {
        $builder = $this->db->table($this->table)
            ->select('pencapaian_ekspor.*, users.name as user_name')
            ->join('users', 'users.id = pencapaian_ekspor.user_id_ekspor');

        if ($id !== null) {
            $builder->where('pencapaian_ekspor.id', $id);
        }

        return $id ? $builder->get()->getRowArray() : $builder->get()->getResultArray();
    }

    /**
     * Mengambil data pencapaian ekspor berdasarkan user_id.
     *
     * @param int $userId
     * @return array
     */
    public function getPencapaianByUserId($userId)
    {
        return $this->where('user_id_ekspor', $userId)->findAll();
    }

    /**
     * Mengambil data pencapaian ekspor berdasarkan status verifikasi.
     *
     * @param string $status
     * @return array
     */
    public function getByStatus($status)
    {
        return $this->where('status_verifikasi', $status)->findAll();
    }

    /**
     * Mengambil data pencapaian ekspor yang telah diverifikasi.
     *
     * @return array
     */
    public function updateVerifikasi(int $id, string $status): bool
    {
        return $this->update($id, ['status_verifikasi' => $status]);
    }

    /**
 * Mengambil data pencapaian ekspor yang memiliki status verifikasi pending.
 *
 * @return array
 */
/**
 * Mengambil data pencapaian ekspor yang memiliki status verifikasi pending,
 * beserta nama pengguna berdasarkan user_id_ekspor.
 *
 * @return array
 */
public function getUnverifiedLainnya(): array
{
    return $this->select('pencapaian_ekspor.*, users.nama_user, perusahaan.nama_perusahaan')
                ->join('users', 'users.user_id = pencapaian_ekspor.user_id_ekspor')
                ->join('perusahaan', 'perusahaan.user_id_perusahaan = users.user_id', 'left')
                ->where('users.role', 'user')
                ->where('pencapaian_ekspor.status_verifikasi', 'pending')
                ->findAll();
}


}
