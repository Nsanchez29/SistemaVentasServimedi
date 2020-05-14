<div class="col-lg-6 hidden-xs">

    <div class="box box-default">

        <center>

            <h3><script src="vistas/js/fecha.js"></script></h3>

            <h3 class="card-header" id="mesYAnio" hidden="id"></h3>

        </center>

        <table class="table table-responsive table-hover" id="calendar">

            <thead>

                <tr>
                    <th style="text-align: center;">D</th>
                    <th style="text-align: center;">L</th>
                    <th style="text-align: center;">M</th>
                    <th style="text-align: center;">M</th>
                    <th style="text-align: center;">J</th>
                    <th style="text-align: center;">V</th>
                    <th style="text-align: center;">S</th>
                </tr>
            </thead>

            <tbody id="calendar-body" style="text-align: center">
                
            </tbody>

        </table>

        <div class="form-inline">

            <center>

            <button class="btn btn-danger" id="previous" onclick="previous()"><i class="icon-chevron-thin-left"></i></button>

            <button class="btn btn-danger" id="next" onclick="next()"><i class="icon-chevron-thin-right"></i></button>

            <select class="selectpicker form-control" multiple data-max-options="1" data-style="btn-dodgerblue" data-size="8" name="month" id="month" onchange="jump()">
                <option value=0>Enero</option>
                <option value=1>Febrero</option>
                <option value=2>Marzo</option>
                <option value=3>Abril</option>
                <option value=4>Mayo</option>
                <option value=5>Junio</option>
                <option value=6>Julio</option>
                <option value=7>Agosto</option>
                <option value=8>Septiembre</option>
                <option value=9>Octubre</option>
                <option value=10>Noviembre</option>
                <option value=11>Diciembre</option>
            </select>

            <label for="year"></label>

            <select class="selectpicker form-control" data-style="btn-dodgerblue" data-size="8" multiple data-max-options="1" name="year" id="year" onchange="jump()">
                <option value=1990>1990</option>
                <option value=1991>1991</option>
                <option value=1992>1992</option>
                <option value=1993>1993</option>
                <option value=1994>1994</option>
                <option value=1995>1995</option>
                <option value=1996>1996</option>
                <option value=1997>1997</option>
                <option value=1998>1998</option>
                <option value=1999>1999</option>
                <option value=2000>2000</option>
                <option value=2001>2001</option>
                <option value=2002>2002</option>
                <option value=2003>2003</option>
                <option value=2004>2004</option>
                <option value=2005>2005</option>
                <option value=2006>2006</option>
                <option value=2007>2007</option>
                <option value=2008>2008</option>
                <option value=2009>2009</option>
                <option value=2010>2010</option>
                <option value=2011>2011</option>
                <option value=2012>2012</option>
                <option value=2013>2013</option>
                <option value=2014>2014</option>
                <option value=2015>2015</option>
                <option value=2016>2016</option>
                <option value=2017>2017</option>
                <option value=2018>2018</option>
                <option value=2019>2019</option>
                <option value=2020>2020</option>
                <option value=2021>2021</option>
                <option value=2022>2022</option>
                <option value=2023>2023</option>
                <option value=2024>2024</option>
                <option value=2025>2025</option>
                <option value=2026>2026</option>
                <option value=2027>2027</option>
                <option value=2028>2028</option>
                <option value=2029>2029</option>
                <option value=2030>2030</option>

            </select>

        </center>

    </div>

</div>

</div>

<script src="vistas/js/calendario.js"></script>