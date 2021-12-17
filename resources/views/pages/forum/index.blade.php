@extends('layouts.app')
@section('title')
    Forum
@endsection
@section('css')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="container py-5">
      <div class="row py-5">
        <div class="col-lg-10 mx-auto">
          <!-- Button trigger modal -->
          <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#exampleModal">
            <i class="fas fa-plus"></i> Buat Postingan
          </button>

        </div>
        <div class="col-lg-10 mx-auto py-4">
          {{-- komentar --}}
          @foreach ($forums as $forum)
              
          
          <hr>
          <div class="d-flex justify-content-between">
            <div class="d-flex align-items-center">
              <img src="{{$forum->user->get_img_avatar()}}" class="rounded-circle mr-3" style="width: 9%" alt="">
              <div class="">
                  <div class="">
                      <b style="font-size: 1.2rem">{{$forum->user->name}}</b>
                  </div>
                  <div>{{Carbon\Carbon::parse($forum->created_at)->IsoFormat('d MMMM YYYY, LT ')}}</div>
              </div>
            </div>
            <div class="d-flex  align-items-center">

              <div class="">
                <a href="" class="">
                  <span><i class="fas fa-arrow-circle-up" style="font-size: 1.4rem"></i> 1</span>
                </a>
              </div>
              <div class="px-2">
                |
              </div>
              <div>
                <a href="">
                  <span><i class="fas fa-arrow-circle-down" style="font-size: 1.4rem"></i> 1</span>
                </a>
              </div>

            </div>
          </div>
          <div class="py-3">
            <p class="font-weight-bold">
              {{$forum->desc}}
            </p>
            <div>
              @if ($forum->image != null)
              <img src="{{$forum->get_img_forum()}}" class="" style="width: 25%" alt="">
              @endif
            </div>
            <div class="mt-3">
              <span href="" class="">Lihat {{$forum->komentar()->where('parent',0)->count()}} Komentar</span>
            </div>
          </div>
          <div class="card-body rounded-lg" style="background-color: #FAFAFA">
            <div class="d-flex justify-content-between align-items-center align-self-center">
              <img src="{{asset('bootstrap/assets/img/user-2.jpg')}}" class="rounded-circle mr-3" style="width: 4%" alt="">
              <form class="w-100" action="{{route('forum.add.comment')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="input-group ">
                  <input type="hidden" id="forum_id" name="forum_id" value="{{$forum->id}}">
                  <input type="hidden" id="parent" name="parent" value="0">
                  <input id="desc_comment" name="desc_comment" type="text" class="form-control rounded-lg mr-3" placeholder="Tambahkan komentar..." aria-label="Recipient's username" aria-describedby="button-addon2">
                  <div class="input-group-append">
                    <button class="btn btn-success rounded-lg" type="submit" id="button-addon2">Tambah Komentar</button>
                  </div>
                </div>
              </form>
            </div>

            {{-- forloop komentar --}}
            @foreach ($forum->komentar()->where('parent',0)->orderBy('created_at','desc')->limit(1)->get() as $komentar)
            <div class="d-flex align-items-center py-3">
              <img src="{{$komentar->user->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 4%" alt="">
              <div class="w-100">
                <div class="">
                  <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('d MMMM YYYY')}}</span></span>
                </div>
                <div class="">
                  <p class="font-weight-bold">
                    {{$komentar->desc_comment}}
                  </p>
                </div>
                <div class="d-flex justify-content-between">
                  <div class="d-flex align-items-center">
                    <a href="">
                      <span class="material-icons mr-2">
                        arrow_circle_up
                      </span>
                    </a>
                    <span style="color: gray">Dukung Naik . 7</span>
                  </div>

                  <div class="d-flex align-items-center">
                    <a href="">
                      <span class="material-icons mr-2" style="color: gray">
                        arrow_circle_down
                      </span>
                    </a>
                    {{-- <a href="">
                      <span class="material-icons" style="color: gray">
                        outlined_flag
                      </span>
                    </a> --}}
                  </div>
                </div>
              </div>
            </div> 
            @endforeach
            <div id="collapse-{{$forum->id}}" class="collapse">
              @foreach ($forum->komentar()->where('parent',0)->orderBy('created_at','desc')->skip(1)->take(3)->get() as $komentar)
              <div class="d-flex align-items-center py-3">
                <img src="{{$komentar->user->get_img_avatar()}}" class="rounded-circle mr-3 d-flex align-self-baseline" style="width: 4%" alt="">
                <div class="w-100">
                  <div class="">
                    <span><b>{{$komentar->user->name}}</b><span style="color: gray"> . {{Carbon\Carbon::parse($komentar->created_at)->IsoFormat('dddd MMMM YYYY, LT A')}}</span></span>
                  </div>
                  <div class="">
                    <p class="font-weight-bold">
                      {{$komentar->desc_comment}}
                    </p>
                  </div>
                  <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                      <a href="">
                        <span class="material-icons mr-2">
                          arrow_circle_up
                        </span>
                      </a>
                      <span style="color: gray">Dukung Naik . 7</span>
                    </div>
  
                    <div class="d-flex align-items-center">
                      <a href="">
                        <span class="material-icons mr-2" style="color: gray">
                          arrow_circle_down
                        </span>
                      </a>
                      {{-- <a href="">
                        <span class="material-icons" style="color: gray">
                          outlined_flag
                        </span>
                      </a> --}}
                    </div>
                  </div>
                </div>
              </div>                  
              @endforeach
            </div>

            <div>
              <button class="btn btn-link btn-block text-center collapsible-link" type="button" data-toggle="collapse" data-target="#collapse-{{$forum->id}}" aria-expanded="false" aria-controls="collapseOne">
                Lihat Semua Komentar
              </button>
            </div>

          </div>
          @endforeach

        </div>

      </div>
    </div>








    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div>
            <div class=" d-flex align-items-center justify-content-center">
              <h5 class="modal-title mt-2" id="exampleModalLabel">Buat Postingan</h5>
              <div class="d-block justify-content-end">
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button> --}}
              </div>
            </div>
          </div>
          <div class="modal-body">
            <div class="d-flex align-items-center">
              <img src="{{asset('bootstrap/assets/img/user.jpg')}}" class="rounded-circle mr-3" style="width: 7%" alt="">
              <div class="">
                  <div>"Nama" Memposting</div>
              </div>
            </div>
            <div class="mt-3">
              <form action="{{route('forum.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <textarea name="desc" id="desc" cols="30" rows="7" class="form-control"></textarea>
                <input type="file" name="image" id="image" class="form-control-file mt-3">
                <div class="mt-3">
                  <button type="submit" class="btn btn-primary w-100">Posting</button>
                </div>
              </form>
            </div>
          </div>
          {{-- <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div> --}}
        </div>
      </div>
    </div>
@endsection