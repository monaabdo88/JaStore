        <div class="form-group {{$errors->has('name') ? 'has-error':''}}">
            {{Form::label('name','Product Name:')}}
            {{Form::text('name',$product->name,['class'=>'form-control border-input','placeholder'=>'Macbook pro'])}}
                @if($errors->has('name'))
                        <p class="text-danger">{{$errors->first('name')}}</p>
                @endif
        </div>

        <div class="form-group {{$errors->has('price') ? 'has-error':''}}">
            {{Form::label('price','Product Price:')}}
            {{Form::text('price',$product->price,['class'=>'form-control border-input','placeholder'=>'$2500'])}}
                @if($errors->has('price'))
                        <p class="text-danger">{{$errors->first('price')}}</p>
                @endif
        </div>

        <div class="form-group {{$errors->has('description') ? 'has-error':''}}">
            {{Form::label('description','Product Description:')}}
            {{Form::textarea('description',$product->description,['class'=>'form-control border-input','placeholder'=>'Product Description'])}}
                @if($errors->has('description'))
                        <p class="text-danger">{{$errors->first('description')}}</p>
                @endif
        </div>

        <div class="form-group {{$errors->has('image') ? 'has-error':''}}">
            {{Form::label('image','Product Image:')}}
            {{Form::file('image',['class'=>'form-control border-input','id'=>'file-input'])}}
            <div id="thumb-output">
                @if($product->image)
                    <img src="{{url('uploads/').'/'.$product->image}}" class="thumb" />
                    @endif
            </div>
        @if($errors->has('image'))
                        <p class="text-danger">{{$errors->first('image')}}</p>
                @endif
        </div>
