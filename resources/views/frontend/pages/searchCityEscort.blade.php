@if(isset($data))
<div class="col-lg-12">
   <div class="tab-content" id="pills-tabContent">
      <div class="tab-pane fade show active " id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
         <div class="simplebar res-img-grid" id="myElement" >
            <ul class="res-tab-imgs" >
               <?php /*$escorts =\App\User::all()->where('roleStatus', 2);*/ ?>
               @foreach($data as $escort)
               <li>
                  <div class="img-box">
                     <img src="{{asset('public/localresources/'.$escort->image)}}" class="img-fluid"/>
                     <div class="top-content">{{$escort->name}}</div>
                     <div class="bottom-content">{{ $escort->title }}</div>
                  </div>
               </li>
               @endforeach
            </ul>
         </div>
      </div>
      </ul>
   </div>
</div>
</div>
</div>
@endif