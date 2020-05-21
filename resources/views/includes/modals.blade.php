       <!-- Modal -->
       {{-- 
        register post from shows in collections
         --}}
       <div class="modal fade" id="NewPostShow" tabindex="-1" role="dialog" aria-labelledby="NewPostShow" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">New Post</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                            {!! Form::open(['action' => 'PostsController@store','files' => true, 'method'=>'post', 'enctype'=>'multipart/form-data'], ) !!}
    
                            <div class="form-group">
                            {!! Form::label('title', 'Title') !!}
                            {!! Form::text('title','', ['class'=>'form-control' , 'placeholder' =>'Title']) !!}
                            </div>
                            <div class="form-group">
                            {!! Form::label('body', 'Body') !!}
                                {!! Form::textarea('body','', ['id'=>'article-ckeditor','class'=>'form-control' , 'placeholder' =>'Body']) !!}
                            </div> 
                                <div class="form-group">
                                    {!! Form::file('cover_image') !!}
                                </div>
                                
                        {!! Form::submit('Submit', ['class' =>'btn btn-primary col-sm-12']) !!}
                     @if ($collection !== null)
                     {!! Form::hidden('collection', $collection->id, ) !!}
                         
                     @endif
                        
                        {!! Form::close() !!}
                        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> 
            </div>
        </div>
        </div>
    </div>
      <!-- Modal -->
       {{-- 
        register post from shows in collections
         --}}