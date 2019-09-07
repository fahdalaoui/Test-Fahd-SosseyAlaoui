@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Ajouter une opération') }}</div>

                <div class="card-body">
                    <form method="post" enctype="multipart/form-data"  action="{{ url('/tech/insert/'.$vech_id) }}">
                        {{csrf_field()}}

                        <div class="form-group row">
                            <label for="dateDebut" class="col-md-4 col-form-label text-md-right">{{ __('Date de debut') }}</label>

                            <div class="col-md-6">
                                <input id="dateDebut" type="date" class="form-control @error('dateDebut') is-invalid @enderror" name="dateDebut" value="{{ old('dateDebut') }}"
                                 required autocomplete="dateDebut" autofocus>
                                
                                @error('dateDebut')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="sujet" class="col-md-4 col-form-label text-md-right">{{ __('Sujet') }}</label>

                            <div class="col-md-6">
                                <input id="sujet" type="text" class="form-control @error('sujet') is-invalid @enderror" name="sujet" value="{{ old('sujet') }}" required autocomplete="sujet">

                                @error('sujet')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="Description" class="col-md-4 col-form-label text-md-right">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <textarea id="Description" type="text" class="form-control @error('Description') is-invalid @enderror" name="Description" required autocomplete="Description"></textarea>

                                @error('Description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="pièces" class="col-md-4 col-form-label text-md-right">{{ __('Pièces affectées') }}</label>
                            <table>
                                <thead>
                                    <tr>
                                    <td class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " name="pièces[]"
                                        id="pièces" value="Moteur">
                                        <label class="custom-control-label" for="pièces">Moteur</label>
                                    
                                    </td>
                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input " name="pièces[]" 
                                        id="pièces2" value="Frein">
                                        <label class="custom-control-label" for="pièces2">Frein</label>
                                    </td>

                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input " name="pièces[]"
                                        id="pièces3" value="Disque d'embrayage">
                                        <label class="custom-control-label" for="pièces3">Disque d'embrayage</label>
                                        
                                    </td>
                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input " name="pièces[]"
                                        id="pièces4" value="Embrayage">
                                        <label class="custom-control-label" for="pièces4">Embrayage</label>
                                        
                                    </td>
                                    <td class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="pièces[]" 
                                        id="pièces6" value="Amortisseur">
                                        <label class="custom-control-label" for="pièces6">Amortisseur</label>
                                        
                                    </td>
                                    </tr>
                                    
                                </thead>
                            </table>
                            <table>
                                <thead>
                                    <tr>
                                    <td class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input " name="pièces[]"
                                        id="pièces5" value="Filtre à air" >
                                        <label class="custom-control-label" for="pièces5">Filtre à air</label>
                                        
                                    </td>
                                    

                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input " name="pièces[]" 
                                        id="pièces7" value="Bougies d'allumage">
                                        <label class="custom-control-label" for="pièces7">Bougies d'allumage</label>
                                        
                                    </td>
                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input" name="pièces[]" 
                                        id="pièces8" value="Ressort de suspension">
                                        <label class="custom-control-label" for="pièces8">Ressort de suspension</label>
                                        
                                    </td>
                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input " name="pièces[]"
                                        id="pièces9" value="Capteur pmh">
                                        <label class="custom-control-label" for="pièces9">Capteur pmh</label>
                                        
                                    </td>
                                    <td class="custom-control custom-checkbox" >
                                        <input type="checkbox" class="custom-control-input" name="pièces[]"
                                        id="pièces10" value="Filtre à huile">
                                        <label class="custom-control-label" for="pièces10">Filtre à huile</label>
                                    </td>
                                    </tr>
                                </thead>
                            </table>
                        </div>
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
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control-file @error('Image') is-invalid @enderror" name="image" required autocomplete="image">

                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Ajouter') }}
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
