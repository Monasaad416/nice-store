<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fas fa-bell fa-fw"></i>
<!-- Counter - Alerts -->
<span class="badge badge-danger badge-counter">{{$unreadCount}}</span>
</a>

<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
      aria-labelledby="alertsDropdown">
      <h6 class="dropdown-header">
            Notifications
      </h6>
      @foreach($notifications as $notification)
         <a class="dropdown-item d-flex align-items-center" href="{{$notification->data['url']}}?notification_id={{$notification->id}}">
            <div class="mr-3">
               <div class="icon-circle bg-primary">
                  <i class="{{$notification->data['icon']}} text-white"></i>
               </div>
            </div>
            <div>
               <div class="small text-gray-500">{{$notification->created_at->longAbsoluteDiffForHumans()}}</div>
               <span class="@if($notification->unread()) font-weight-bold @endif">{{$notification->data['body']}}</span>
            </div>
         </a> 
      @endforeach


      <a class="dropdown-item text-center small text-gray-500" href="{{route('store.dashboard.notifications.all')}}">Show All Alerts</a>
   </div>