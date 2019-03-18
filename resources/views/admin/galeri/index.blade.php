@extends('admin/template')
@section('icerik')
    <div style="float:right;margin:15px 0 5px 0;"><a href="{{route('galeri.create')}}" class="btn btn-success">Resim Yükle</a></div>
    <div style="clear:both;"></div>
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span12">
                <div class="widget-box">
                    <div class="widget-title"> <span class="icon"> <i class="icon-picture"></i> </span>
                        <h5>Resim Galerisi</h5>
                    </div>
                    <div class="widget-content">
                        <ul class="thumbnails">

                            @foreach($resimler as $resim)


                                <li class="span2"><img src="/{{$resim->resim}}" alt="" width="220" height="50">
                                    <div class="actions"> <a title="" class="" href="{{route('galeri.destroy',$resim->id)}}" data-method="delete" data-token="{{csrf_token()}}" data-confirm="Silinsin mi?"><i class="icon-trash"></i></a> <a class="lightbox_trigger" href="/{{$resim->resim}}"><i class="icon-search"></i></a> </div>
                                </li>


                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>
        </div>

    </div>


    @endsection




@section('css')

@endsection

@section('js')
    <script>

        (function(window, $, undefined) {
            var Laravel = {
                initialize: function() {
                    this.methodLinks = $('a[data-method]');
                    this.token = $('a[data-token]');
                    this.registerEvents();
                },
                registerEvents: function() {
                    this.methodLinks.on('click', this.handleMethod);
                },
                handleMethod: function(e) {
                    e.preventDefault()
                    var link = $(this)
                    var httpMethod = link.data('method').toUpperCase()
                    var form

                    if ($.inArray(httpMethod, ['PUT', 'DELETE']) === -1) {
                        return false
                    }
                    Laravel
                        .verifyConfirm(link)
                        .done(function () {
                            form = Laravel.createForm(link)
                            form.submit()
                        })
                },
                verifyConfirm: function(link) {
                    var confirm = new $.Deferred()
                    var userResponse = window.confirm(link.data('confirm'))
                    if (userResponse) {
                        confirm.resolve(link)
                    } else {
                        confirm.reject(link);
                    }
                    return confirm.promise()
                },
                createForm: function(link) {
                    var form =
                        $('<form>', {
                            'method': 'POST',
                            'action': link.attr('href')
                        });
                    var token =
                        $('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': link.data('token')
                        });
                    var hiddenInput =
                        $('<input>', {
                            'name': '_method',
                            'type': 'hidden',
                            'value': link.data('method')
                        });
                    return form.append(token, hiddenInput)
                        .appendTo('body');
                }
            };
            Laravel.initialize();
        })(window, jQuery);



    </script>



@endsection