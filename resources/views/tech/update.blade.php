@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Modifier une opération') }}</div>

                <div class="card-body">
                    <form method="post" action="{{ url('/tech/modifier/'.$operation_id) }}">
                        {{csrf_field()}}
                        <div class="form-group row">
                            <label for="Notes" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}</label>

                            <div class="col-md-6">
                                <input id="Notes" type="text" class="form-control @error('Notes') is-invalid @enderror" name="Notes" required autocomplete="Notes">

                                @error('Notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Modifer') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
