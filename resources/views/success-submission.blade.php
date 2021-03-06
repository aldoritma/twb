@extends('layouts.app')

@section('content')



<div class="container__main "><!-- start main container -->

    @include('partials.navbar')

    <!-- start success setion -->
    <section  id="section--success-submission" class=" section   section--subpage">
        
        <div class="container">
            <div class="column__span-3-desktop text--left column__span-6-mobile">

                 <h1 class="text--center-mobile">Berhasil</h1>
                 <br><br>
                 <p class="text--white text--center-mobile">
                     Terima kasih Moms telah berpartisipasi dalam kompetisi foto kreatif Dunia Tini Wini Biti! 
                     <br><br>
                     Karya Moms akan di moderasi terlebih dahulu oleh admin kami.
                     <br><br>
                     Setelah karya Moms diterima, Moms bisa share foto kreatif Moms bersama si kecil untuk mengumpulkan likes karena ada banyak hadiah menarik dari Tini Wini Biti, lho!
                 </p>
                 <br>
            </div>
            <div class="column__span-6 text--center-mobile">
                <!--a href="" class="button button__split button--facebook-share rounded ">
                    <span class="button--icon"><i class="icon icon--facebook"></i></span>
                    <span class="button--text">Share</span>
                </a-->
                <br><br>
                <a href="{!! url('/') !!}" class="button__back text--white">< Kembali ke beranda</a>
            </div>
        </div>
    <br><br><br><br>

    </section>
    <!-- end of success section -->


</div><!-- end of main container -->



@endsection
