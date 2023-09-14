<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AdController extends Controller
{
    public function getAllAds()
    {
        $ads = Ad::all();

        return DataTables::of($ads)
            ->addColumn('action', function ($ad) {
                return '
                <div class="text-center">
                    <button class="btn btn-primary view-btn" data-id="' . $ad->id . '">P</button>
                    <button class="btn btn-warning edit-btn" data-id="' . $ad->id . '">E</button>
                    <button class="btn btn-danger delete-btn" data-id="' . $ad->id . '">C</button>
                </div>
            ';
            })
            ->addColumn('status', function ($ad) {
                $statusOptions = [
                    1 => 'Published',
                    0 => 'Unpublished',
                ];

                $statusSelect = '<select class="status-select form-control" style="background: #FFE5E5" data-id="' . $ad->id . '">';
                foreach ($statusOptions as $value => $label) { // $value = array_key && $label = published or unpublished
                    $selected = $ad->published == $value ? 'selected' : '';
                    $statusSelect .= '<option value="' . $value . '" ' . $selected . '>' . $label . '</option>';
                }
                $statusSelect .= '</select>';

                return $statusSelect;
            })
            ->rawColumns(['status', 'action'])
            ->make(true);
    }
}
