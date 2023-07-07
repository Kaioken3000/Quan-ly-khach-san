<?php

namespace App\Http\Controllers;

use App\Models\Danhsachdatphong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Datphong;
use App\Models\Phong;
use App\Models\Loaiphong;
use App\Models\Khachhang;
use App\Models\Nhanvien;
use App\Models\User;

class BaocaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // cho phan hien thi danh sach da thanh toan
        $datphongs = Datphong::where('tinhtrangthanhtoan', 1)->get();
        $tonggiatatca = 0;
        foreach ($datphongs as $datphong) {
            $danhsachdatphongs = Danhsachdatphong::where('datphongid', $datphong->id)->get();
            foreach ($danhsachdatphongs as $danhsachdatphong) {
                //tim phong va loai phong
                $phong = Phong::find($danhsachdatphong->phongid);
                $loaiphong = Loaiphong::find($phong->loaiphongid);

                //tinh gia tien
                $songay = strtotime($danhsachdatphong->ngayketthuco) - strtotime($danhsachdatphong->ngaybatdauo);
                $songay = abs(round($songay / 86400));
                $tonggiatatca += $songay * $loaiphong->gia * $datphong->soluong;
            }
        }
        // Log::info($datphongs);
        // Log::info($tonggiatatca);


        // cho phan hien thi do thi giong dashboard
        $phong = Phong::get();
        $sophong = $phong->count();

        $khachhang = Khachhang::get();
        $sokhachhang = $khachhang->count();

        $nhanvien = Nhanvien::get();
        $sonhanvien = $nhanvien->count();

        $user = User::get();
        $souser = $user->count();

        //thanh toan
        $datphong = Datphong::get();

        $chuathanhtoan = collect();
        $dathanhtoan = collect();
        $chuanhanphong = collect();
        $danhanphong = collect();
        foreach ($datphong as $d) {
            $temp = $d->tinhtrangthanhtoan;
            $temp2 = $d->tinhtrangnhanphong;
            if ($temp == 0) {
                $chuathanhtoan->add($temp);
            } else {
                $dathanhtoan->add($temp);
            }
            if ($temp2 == 0) {
                $chuanhanphong->add($temp);
            } else {
                $danhanphong->add($temp);
            }
        }

        $thanhtoan = collect();
        $thanhtoan->add(array(
            'chuathanhtoan' => 'chuathanhtoan',
            'sochuathanhtoan' => $chuathanhtoan->count(),
            'dathanhtoan' => 'dathanhtoan',
            'sodathanhtoan' => $dathanhtoan->count(),
        ));
        $nhanphong = collect();
        $nhanphong->add(array(
            'chuanhanphong' => 'chuanhanphong',
            'sochuanhanphong' => $chuanhanphong->count(),
            'danhanphong' => 'danhanphong',
            'sodanhanphong' => $danhanphong->count(),
        ));

        // tinh so phong o nhieu nhat, it nhat
        $danhsachdatphongs = Danhsachdatphong::get();
        $phongs = Phong::get();
        // $soluongphong = [];
        $soluongphong = collect();
        $soluongphong->add(array(
            'chuanhanphong' => 'chuanhanphong',
            'sochuanhanphong' => $chuanhanphong->count(),
            'danhanphong' => 'danhanphong',
            'sodanhanphong' => $danhanphong->count(),
        ));
        foreach ($phongs as $phong) {
            $dem = 0;
            foreach ($danhsachdatphongs as $danhsachdatphong) {
                if ($phong->so_phong == $danhsachdatphong->phongid) {
                    $dem++;
                }
            }
            $soluongphong[] =  $dem;
        }

        // $maxs = array_keys($soluongphong, max($soluongphong));
        // $phongnhieunhat=[];
        // foreach ($phongs as $p) {
        //     for ($i = 0; $i < count($maxs); $i++) {
        //         if ($maxs[$i] == $p->so_phong) {
        //             $phongnhieunhat[] = $p->so_phong;
        //         }
        //     }
        // }

        return view('baocaos.index', compact('datphongs', 'tonggiatatca', 'sophong', 'sokhachhang', 'sonhanvien', 'souser', 'thanhtoan', 'nhanphong', 'soluongphong','phong'));
    }
}
