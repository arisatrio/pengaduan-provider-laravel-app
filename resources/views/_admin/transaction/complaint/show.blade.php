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
        <div class="box box-widget">
            <div class="box-header with-border">
                <div class="user-block">
                    <span class="username"><a href="#">{{ $complaint->name }}</a></span>
                    <span class="deskripsi">{{ $complaint->created_at->formatLocalized('%A, %d %B %Y') }} - {{ $complaint->created_at->diffForHumans() }}</span>
                </div>
        
                <div class="box-tools">
                    <form action="{{ route('mark-done-complain', $complaint->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-success mb-2"><i class="fa fa-check"></i> SELESAI</button>
                    </form>
                    <a href="{{ route('forward-replies', $complaint->id) }}" class="btn btn-info"><i class="fa fa-forward"></i> Teruskan ke Provider</a>
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

            <div class="box-footer">
                <form action="{{ route('reply-complain', $complaint->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="img-push">
                        <input type="text" class="form-control input-sm" name="reply" placeholder="Balas Pengaduan ...">
                        <button class="btn btn-success mt-2">KIRIM</button>
                    </div>
                </form>
            </div>
        
        </div>
    @endslot
</x-admin.layout-component>
@endsection