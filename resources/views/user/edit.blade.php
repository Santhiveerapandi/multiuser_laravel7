@extends('layouts.admin') 
@section('content') 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-primary my-3">
                <div class="card-header">	
					<div class="pull-left">
						<h3 class="card-title">{{ __('Edit User') }}</h3>		
					</div>
					
					<div class="card-tools">
					<a class="btn btn-xs btn-success" 
						href="{{ route('user.index') }}">{{ __('Back') }}</a>
						<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
						<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
					</div>

				</div>

            <div class="card-body">
				
				{!! Form::open(array('route' => ['user.update', $user->id], 'method'=>'POST', 'enctype'=>'multipart/form-data')) !!}
				@csrf
                @method('PUT')
				@if (count($errors) > 0)
				<div class="alert alert-danger">
					<strong>Whoops!</strong> There were some problems with your input.<br><br>
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>

				@endif
				<div class="form-group row py-3">
						<label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }} </label>

						<div class="col-md-6">
							<input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ $user['first_name'] }}" maxlength="50" autocomplete="first_name" autofocus>

							@error('first_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row py-3">
						<label for="middle_name" class="col-md-4 col-form-label text-md-right">{{ __('Middle Name') }} </label>

						<div class="col-md-6">
							<input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name" maxlength="50" value="{{ $user['middle_name'] }}" autocomplete="middle_name" autofocus>

							@error('middle_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row py-3">
						<label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }} </label>

						<div class="col-md-6">
							<input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" maxlength="50" value="{{ $user['last_name'] }}"  autocomplete="last_name" autofocus>

							@error('last_name')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>


		
				<div class="form-group row py-3">
				<label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Address') }} *</label>

					<div class="col-md-6">
						<textarea id="address" class="form-control @error('address') is-invalid @enderror" name="address" maxlenth="200" required autocomplete="address" autofocus>{{$user['address']}}</textarea>

						@error('address')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
					</div>
				</div>

					<div class="form-group row py-3">
						<label for="mobile" class="col-md-4 col-form-label text-md-right">{{ __('Mobile') }} *</label>

						<div class="col-md-6">
							<input id="mobile" placeholder="Enter Mobile Number Only" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ $user['mobile'] }}" maxlength="15" required autocomplete="mobile" autofocus>

							@error('mobile')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row py-3">
						<label for="country_id" class="col-md-4 col-form-label text-md-right">{{ __('Country Name') }} *</label>

						<div class="col-md-6">
							<select id="country_id" class="form-control @error('country_id') is-invalid @enderror" name="country_id" value="{{ $user['country_id'] }}" required autocomplete="country_id" autofocus>
							<option value="">Select Country</option>
							@foreach($countries as $key=>$value)
							<option value="{{$value->id}}" {{$value->id===$user['country_id']? 'selected':''}}>{{$value->name}}</option>
							@endforeach
							</select>
							@error('country_id')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>
					</div>

					<div class="form-group row py-3">
                            <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State Name') }} *</label>

                            <div class="col-md-6">
                                <select id="state_id" class="form-control @error('state_id') is-invalid @enderror" name="state_id" value="{{ $user['state_id'] }}" required autocomplete="state_id" autofocus>
                                <option value="">Select State</option>
                                @if($states)
                                <option value="{{$user['state_id']}}" selected>{{$states->name}}</option>
                                @endif
                                </select>
                                @error('state_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row py-3">
                            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }} *</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" maxlength="100" value="{{ $user['city'] }}" required autocomplete="city" autofocus>

                                @error('city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row radio py-3">
                            <label for="gender_m" class="col-md-4 col-form-label text-md-right">{{ __('Gender') }} *</label>

                            <div class="col-md-6">
                                <label><input id="gender_m" value="Male" type="radio" class=" @error('gender') is-invalid @enderror" name="gender" {{$user["gender"]=="Male"? "checked":""}} required> Male</label><br/>
                                <label><input id="gender_f" value="Female" type="radio" class=" @error('gender') is-invalid @enderror" name="gender" {{$user["gender"]=="Female"? "checked":""}} required> Female</label><br/>
                                <label><input id="gender_o" value="Others" type="radio" class=" @error('gender') is-invalid @enderror" name="gender" {{$user["gender"]=="Other"? "checked":""}} required> Other</label>

                                @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row check py-3">
                            <label for="hobbies_s" class="col-md-4 col-form-label text-md-right">{{ __('Hobbies') }} </label>

                            <div class="col-md-6">
                            <?php $hobbies=explode(",", $user["hobbies"]); ?>
                                <label><input id="hobbies_s" value="songs" type="checkbox" {{in_array("songs", $hobbies)? "checked":""}} class=" @error('hobbies') is-invalid @enderror" name="hobbies[]" > Songs</label><br/>
                                <label><input id="hobbies_r" value="reading" type="checkbox" {{in_array("reading", $hobbies)? "checked":""}} class=" @error('hobbies') is-invalid @enderror" name="hobbies[]" > Reading Books</label><br/>
                                <label><input id="hobbies_w" value="sports" type="checkbox" {{in_array("sports", $hobbies)? "checked":""}} class=" @error('hobbies') is-invalid @enderror" name="hobbies[]" > Playing Sports</label><br/>

                                @error('hobbies')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row py-3">
                            <label for="profile_image" class="col-md-4 col-form-label text-md-right">{{ __('Photo') }} </label>

                            <div class="col-md-6">
                            <input id="profile_image" type="file" accept="image/*" class="@error('profile_image') is-invalid @enderror" name="profile_image">
                                @error('profile_image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @if($user['profile_image'])
                            <img src="{{asset('/storage/profile_images/'.$user['profile_image'])}}" width="40" />
                            @endif
                        </div>

						<div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
			{!! Form::close() !!}
			</div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$("#country_id").change(function(){
    country_id=this.value;
    $.ajax({
        type: "GET",
        url: "{{ url('country/state') }}/"+country_id,
        dataType: 'json',
        success: function(res){
            if(res.success===true){
                $("#state_id").html("");
                $("#state_id").append("<option value=''>Select State</option>");

                if(res.data && res.data.length>0){
                   res.data.map(function(item, index) {
                    $("#state_id").append("<option value='"+item.id+"'>"+item.name+"</option>"); 
                   })
                }
            }else{
                $("#state_id").append("<option value=''>Select State</option>");
            }
        }
    });
})
// Numeric only control handler
jQuery.fn.ForceNumericOnly =
function()
{
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
            var key = e.charCode || e.keyCode || 0;
            // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
            // home, end, period, and numpad decimal
            return (
                key == 8 || 
                key == 9 ||
                key == 13 ||
                key == 46 ||
                key == 110 ||
                key == 190 ||
                (key >= 35 && key <= 40) ||
                (key >= 48 && key <= 57) ||
                (key >= 96 && key <= 105));
        });
    });
};

$("#mobile").ForceNumericOnly();
</script>
@endsection