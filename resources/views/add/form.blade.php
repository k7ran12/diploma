<div class="box box-info padding-1">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Participante</label>
                    <input required type="text" name="participante" id="participante" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <label>Banda</label>
                <select required name="banda_id" class="form-select" aria-label="Default select example">
                    <option>Elija un banda</option>
                    @foreach ($bandas as $banda)
                    <option value="{{$banda->id}}">{{ $banda->nombre_banda }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12">
                <div required class="form-group">
                    <label>Puntos</label>
                    <input type="text" name="puntos" id="puntos" class="form-control">
                </div>
            </div>
            <div class="col-md-12">
                <label>Banda</label>
                <select required name="modo" class="form-select" aria-label="Default select example">
                    <option>Elija un banda</option>
                    <option value="SSB">SSB</option>
                    <option value="FT8">FT8</option>
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer mt-3">
        <center><button type="submit" class="btn btn-primary">Submit</button></center>
    </div>
</div>
