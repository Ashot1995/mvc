<div class="container">
    <div class="row">
        <form action="/result" method="get">
            <h2>Треугольник</h2>
            <div>
                <div class="form-group">
                    <label for="width">Row count</label>
                    <div class="d-flex">
                        <input type="number" class="form-control" id="row" name="row" placeholder="20" value="2"
                               max="25" min="2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="char">Char</label>
                    <select name="char" class="form-control">
                        <option value="#">#</option>
                        <option value="*">*</option>
                        <option value="@">@</option>
                    </select>
                </div>
            </div>
            <h2>Квадрат</h2>
            <div class="form-group">
                <label for="height">Height</label>
                <div class="d-flex">
                    <input type="number" class="form-control" id="height" name="height" max="1000" placeholder="200">px
                </div>
            </div>
            <div class="form-group">
                <label for="width">Width</label>
                <div class="d-flex">
                    <input type="number" class="form-control" id="width" name="width" max="1000" placeholder="200">px
                </div>
            </div>
            <div class="form-group">
                <label for="color">Background color</label>
                <select name="color" class="form-control">
                    <option value="red">Red</option>
                    <option value="blue">Blue</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="grey">grey</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>

