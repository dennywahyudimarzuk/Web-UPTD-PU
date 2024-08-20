<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Banner;
use App\Models\News;
use App\Models\Gallery;
use App\Models\Information;
use App\Models\Menu;
use App\Models\MenuChild;
use Illuminate\Http\Request;
use App\Models\IdentityWebsite;
use App\Models\RelatedLinks;
use App\Models\SocialMedia;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        view()->share('menu', $menu = Menu::where('active', 1)->with('menu_child')->orderBy('order', 'asc')->get());
        view()->share('identity_website', $identity_website = IdentityWebsite::first());
        view()->share('social_media', $social_media = SocialMedia::get());
        view()->share('related_links', $related_links = RelatedLinks::get());
        view()->share('berita_disdukcapil', $berita_disdukcapil = News::orderBy('publish_date', 'desc')->paginate(5));
        try {
            $arrContextOptions = array(
                "ssl" => array(
                    "verify_peer" => false,
                    "verify_peer_name" => false,
                ),
            );
            $berita3 = json_decode(file_get_contents('https://sumselprov.go.id/api/sumselprov/api_berita_sumsel3', true, stream_context_create($arrContextOptions)));
        }
        catch (\Throwable $th) {
                $berita3 = [];
            }
        view()->share('berita3', $berita3);
    }

    public function index()
    {
        $banner = Banner::where('active', '1')->latest()->get();
        $berita_disdukcapil3 = News::orderBy('publish_date', 'desc')->paginate(3);
        $foto = Gallery::where('category', 'image')->where('active', '1')->latest()->paginate(4);
        return view('frontend.beranda', compact('banner','berita_disdukcapil3','foto'));
    }

    public function page(Request $request)
    {
        $data = Menu::where('url', $request->page)->first();
        if($data == null){
            $data = MenuChild::with('menu', 'page')->where('url', $request->page)->first();
        }
        if($data->page != null){
            return view('frontend.page.'.$data->page->template, compact('data'));
        }else{
            return view('errors.404');
        }
    }
    // public function sejarah()
    // {
    //     return view('frontend.profil.sejarah');
    // }
    // public function visimisi()
    // {
    //     return view('frontend.profil.visimisi');
    // }
    // public function struktur()
    // {
    //     return view('frontend.profil.struktur');
    // }

    // public function kegiatan()
    // {
    //     return view('frontend.berita.kegiatan');
    // }
    // public function kegiatandetail()
    // {
    //     return view('frontend.berita.kegiatandetail');
    // }

    public function berita(Request $request)
    {
        $page = $request->page;
        $pg = $request->pg;
        $data = Menu::where('url', $pg)->first();
        if($data == null){
            $data = MenuChild::with('menu', 'page')->where('url', $pg)->first();
        }
        if($pg == "berita-sumsel"){
            try {
                $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                );
                $berita = json_decode(file_get_contents('https://sumselprov.go.id/api/sumselprov/api_berita_all2?page=' . $page, true, stream_context_create($arrContextOptions)));
            } catch (\Throwable $th) {
                $berita['data'] = [];
            }
        }elseif($pg == 'berita-disdukcapil'){
            $berita = News::orderBy('publish_date', 'desc')->paginate(15);
        }else{
            return view('errors.404');
        }
        return view('frontend.berita.index', compact('data', 'berita', 'pg', 'page'));
    }
    public function beritadetail(Request $request)
    {
        $pg = $request->pg;
        $slug = $request->slug;
        $gambar = '';
        $berita = '';
        if($pg == "berita-sumsel"){
            try {
                $arrContextOptions = array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                    ),
                );
                $berita = json_decode(file_get_contents('https://sumselprov.go.id/api/sumselprov/beritadetailslug?judul=' . $slug, true, stream_context_create($arrContextOptions)));
            } catch (\Throwable $th) {
                $berita = "";
            }
            if (isset($berita->gambar)){
                $gambar = preg_split('/[,]/', $berita->gambar, -1, PREG_SPLIT_NO_EMPTY);
            }
        }elseif($pg == 'berita-disdukcapil'){
            $berita = News::where('slug',$request->slug)->first();
            if (isset($berita->gambar)){
                $gambar = $berita->gambar;
            }
        }else{
            return view('errors.404');
        }
        return view('frontend.berita.beritadetail', compact('berita','gambar', 'pg'));
    }

    public function informasi(Request $request)
    {
        $page = $request->page;
        $data = Menu::where('url', $page)->first();
        if($data == null){
            $data = MenuChild::with('menu', 'page')->where('url', $page)->first();
        }
        if($page == "perjanjian-kinerja"){
            $informasi = Information::where('information_category_id', 8)->latest()->paginate(10);
            $linkfile = asset('storage/information/agreements/');
        }elseif($page == "indikator-kinerja-utama"){
            $informasi = Information::where('information_category_id', 7)->latest()->paginate(10);
            $linkfile = asset('storage/information/keys/');
        }elseif($page == "rencana-kinerja-tahunan"){
            $informasi = Information::where('information_category_id', 6)->latest()->paginate(10);
            $linkfile = asset('storage/information/annuals/');
        }elseif($page == "rencana-strategis"){
            $informasi = Information::where('information_category_id', 5)->latest()->paginate(10);
            $linkfile = asset('storage/information/strategies/');
        }elseif($page == "sakip"){
            $informasi = Information::where('information_category_id', 4)->latest()->paginate(10);
            $linkfile = asset('storage/information/sakips/');
        }elseif($page == "setiap-saat"){
            $informasi = Information::where('information_category_id', 3)->latest()->paginate(10);
            $linkfile = asset('storage/information/all_times/');
        }elseif($page == "berkala"){
            $informasi = Information::where('information_category_id', 2)->latest()->paginate(10);
            $linkfile = asset('storage/information/periodicallies/');
        }elseif($page == "serta-merta"){
            $informasi = Information::where('information_category_id', 1)->latest()->paginate(10);
            $linkfile = asset('storage/information/necessarilies/');
        }else{
            return view('errors.404');
        }
        return view('frontend.informasi.index', compact('data', 'informasi', 'linkfile'));
    }
    // public function setiapsaat()
    // {
    //     return view('frontend.informasi.setiapsaat');
    // }
    // public function berkala()
    // {
    //     return view('frontend.informasi.berkala');
    // }
    // public function sertamerta()
    // {
    //     return view('frontend.informasi.sertamerta');
    // }

    public function foto()
    {
        $foto = Gallery::where('category', 'image')->latest()->paginate(15);
        return view('frontend.galeri.foto', compact('foto'));
    }
    public function video()
    {
        $video = Gallery::where('category', 'video')->latest()->paginate(15);
        return view('frontend.galeri.video', compact('video'));
    }
    public function agenda()
    {
        $data = Agenda::orderBy('activity_time', 'desc')->paginate(10);
        return view('frontend.agenda', compact('data'));
    }
    public function kontakkami()
    {
        return view('frontend.kontakkami');
    }
}
