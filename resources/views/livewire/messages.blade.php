<div>
    <div class="green-body pt-5">
        <div class="container-fluid dashboard-content">
            <div class="container">
                <h5>Messages</h5>
                <hr>
                @if($success)
                    <div class="alert alert-success mt-2">{{$success}}</div>
                @endif

                @if($messages->count()>0)

                    <table class="table contacts" >

                        <tbody>
                        @foreach($messages as $message)

                            <tr class="unread">

                                <td class="{{$message->status==0?'fw-bold':''}}">{{$message->name}}</td>
                                <td class="{{$message->status==0?'fw-bold':''}}">{!! Illuminate\Support\Str::limit($message->message, 50) !!}</td>
                                <td class="{{$message->status==0?'fw-bold':''}}">{{$message->created_at->diffForHumans()}}</td>
                                <td><a href="{{route('contact.show',$message->id)}}" title="read">
                                        <i class="fas fa-bookmark ms-2"></i></a></td>
                                <td>
                                    <button type="submit" wire:click="deleteMessage({{$message->id}})" class="btn btn-link text-danger"><i class="far fa-trash-alt"></i></button>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-link {{$message->status==1?'text-success':''}}" title="Mark as Read" wire:click="readMessage({{$message->id}})">
                                        <i class="fas fa-envelope"></i></button>
                                </td>
                                @if(is_null($message->response))
                                    <td class="text-danger" title="Not Replied"><i class="fas fa-calendar-check"></i></td>
                                @else
                                    <td class="text-success" title="Replied"><i class="fas fa-calendar-check"></i></td>
                                @endif

                            </tr>


                        @endforeach


                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
    {{$messages->links()}}
</div>
