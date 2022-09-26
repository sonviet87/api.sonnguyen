<?php

use Illuminate\Database\Seeder;
use App\Models\Branch;
use App\Models\Unit;
class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       Branch::insert([
            'name' => 'Trung tâm',
            'address' =>'243A ĐL Đồng Khởi, P.Phú Tân, TP. Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Bến Tre 2',
            'address' =>'581A Đồng Khởi, Kp2, Phú Khương, TP. Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Bến Tre 3',
            'address' =>'31C Nguyễn Du - Phường 2, Tp.Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Tây Đô',
            'address' =>'11 Block 3, xã Quới Sơn, H. Châu Thành, Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Thới lai',
            'address' =>'113 ấp Giồng Bồng, xã Thới Lai, H. Bình Đại, Bến Tre (Cách chợ Thới Lai 200m)'
        ]);
        Branch::insert([
            'name' => 'Ba Tri',
            'address' =>'Ngay vòng xoay An Bình Tây, xã An Bình Tây, huyện Ba Tri, tỉnh Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Mỏ Cày Nam',
            'address' =>'201, QL60 , Tt Mỏ Cày, H.Mỏ Cày Nam, Bến Tre (Gần Thế Giới Di Động thị trấn Mỏ Cày)'
        ]);
        Branch::insert([
            'name' => 'Lab Gia Bảo',
            'address' =>'243A Đồng Khởi, Phú Tân, TP. Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Chợ Lách',
            'address' =>'Ấp Vĩnh Bắc, Xã Vĩnh Thành, H. Chợ Lách, Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Lộc Thuận',
            'address' =>'Ấp 8, xã Lộc Thuận, H. Bình Đại, Bến Tre (Cách chợ Lộc Thuận 500m)'
        ]);
        Branch::insert([
            'name' => 'Thạnh Phú',
            'address' =>'Ấp Thạnh Hòa A, TT Thạnh Phú, H. Thạnh Phú, Tỉnh Bến Tre'
        ]);
        Branch::insert([
            'name' => 'Bình Đại',
            'address' =>'Tổ 2, ấp Bình Hòa, thị trấn Bình Đại (Cách bệnh viện đa khoa Bình Đại 100 m)'
        ]);
        Branch::insert([
            'name' => 'Tân Phong',
            'address' =>'117/5, xã Tân Phong, H. Thạnh Phú, Bến Tre (Cách Ngã tư chợ Tân Phong 50m)'
        ]);

    }
}
