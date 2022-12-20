@extends('_admin.layouts.app')

@section('content')
<x-admin.layout-component>
    @slot('pageHeader')
        Detail Pengaduan
    @endslot

    @slot('breadcrumb')
        <li class="active">Layanan Pengaduan</li>
        <li class="active">Pengaduan Baru</li>
        <li class="active">Detail Pengaduan</li>
    @endslot

    @slot('content')
    <div class="row">
        <div class="col-sm-4">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <span class="username"><a href="#">{{ $complaint->name }}</a></span>
                        <span class="deskripsi">{{ $complaint->created_at->formatLocalized('%A, %d %B %Y') }} - {{ $complaint->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            
                <div class="box-body">
                    <h3>{{ $complaint->kategori->name }}</h3>
                    <p>{{ $complaint->deskripsi }}</p>
                </div>
    
                @if ($complaint->replies)
                    @foreach ($complaint->replies as $reply)
                        <div class="box-footer box-comments">
                            <div class="box-comment">
                                <div class="comment-text">
                                    <span class="username">
                                        {{ $reply->replyBy->name }}
                                        <span class="text-muted pull-right">{{ $reply->created_at->formatLocalized('%A, %d %B %Y') }} - {{ $reply->created_at->diffForHumans() }}</span>
                                    </span>
                                    {{ $reply->reply }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="col-sm-8">
            <div class="box box-widget">
                <div class="box-header with-border">
                    <div class="user-block">
                        <h4><a href="#">Forward ke Provider</a></h4>
                    </div>
                </div>
            
                <div class="box-body">
                    
                </div>

                <div class="box-footer">
                    <form>
                        <select class="form-control mb-2">
                            <option selected disabled hidden>-- Pilih Provider --</option>
                            <option value="">Telkomsel</option>
                            <option value="">Indosat</option>
                            <option value="">Tri</option>
                            <option value="">XL</option>
                            <option value="">Smartfren</option>
                        </select>
                        <div class="img-push">
                            <input type="text" class="form-control input-sm" name="reply" placeholder="Kirim Pengaduan ...">
                            <button class="btn btn-success mt-2" onclick="window.location.reload()">KIRIM</button>
                        </div>
                    </form>
                </div>
    
            </div>
        </div>
    </div>
    
    @endslot
</x-admin.layout-component>
@endsection