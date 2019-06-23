<div class="container w-100 clearfix">
    <div class="l-row">
        <div class="form-body clearfix">        
            {{ form('index/', 'id':'reporte')}}
            <header>{{ movimientos[1]['cia'] }}</header>
            <fieldset>
                {% set nl = 7 %}
                {% set pv = 0 %}
                {% set nr = 29 %}
                {%  for producto in movimientos %}
                    {% set nl = nl + 1 %}
                    {% if nl > 7 %}
                        {% set nr = nr + movimientos[nl]['detalle']['nr'] %}
                        {% if nr > 27 %}
                            {% if pv === 0 %}
                                {% set nr = 7 %}
                                {% set pv = 4 %}
                            {% else %}
                                <p style="page-break-after: always;">&nbsp;</p>
                                <p style="page-break-before: always;">&nbsp;</p>
                                {% set nr = 1 %}
                            {% endif %}
                            <legend> {{ movimientos[2]['Reporte'] }}  </legend>

                            <div class="l-row">
                                <div class="l-col l-col-12">
                                    <span class="colornaranja">{{ 'Fecha: ' ~ movimientos[3]['caja']['txndate'] ~ '  Referencia: INICIO '  ~ movimientos[3]['caja']['refnumber'] ~ '  Efectivo:  ' ~ movimientos[3]['caja']['efectivo'] ~ ' Cheques:  ' ~ movimientos[3]['caja']['cheques'] ~ ' Depositos: ' ~ movimientos[3]['caja']['depositos']   }}  </span>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col l-col-12">
                                    <span class="colornaranja">{{ 'Fecha: ' ~ movimientos[4]['caja']['txndate'] ~ '  Referencia: CALCULADO '  ~ movimientos[4]['caja']['refnumber'] ~ '  Efectivo:  ' ~ movimientos[4]['caja']['efectivo'] ~ ' Cheques:  ' ~ movimientos[4]['caja']['cheques'] ~ ' Depositos: ' ~ movimientos[4]['caja']['depositos']   }}  </span>
                                </div>
                            </div>
                            <div class="l-row">
                                <div class="l-col l-col-12">
                                    <span class="colornaranja">{{ 'Fecha: ' ~ movimientos[5]['caja']['txndate'] ~ '  Referencia: CERRADO '  ~ movimientos[5]['caja']['refnumber'] ~ '  Efectivo:  ' ~ movimientos[5]['caja']['efectivo'] ~ ' Cheques:  ' ~ movimientos[5]['caja']['cheques'] ~ ' Depositos: ' ~ movimientos[5]['caja']['depositos']   }}  </span>
                                </div>
                            </div>

                            <div class="l-row">

                                <div class="l-col l-col-3">
                                    <div class="l-row">

                                        <div class="l-col l-col-6">
                                            <span class="colornaranja">Fecha</span>
                                        </div>

                                        <div class="l-col l-col-6">
                                            <span class="colornaranja">Referencia</span>
                                        </div>

                                    </div>
                                </div>
                                <div class="l-col l-col-4">
                                    <span class="colornaranja">Cliente</span>
                                </div>
                                <div class="l-col l-col-2">
                                    <span class="colornaranja">Valor Venta</span>
                                </div>
                                <div class="l-col l-col-1">
                                    <span class="colornaranja">Iva</span>
                                </div>
                                <div class="l-col l-col-2">
                                    <span class="colornaranja">A cancelar</span>
                                </div>
                            </div>


                        {% endif %}
                        <div class="l-row">

                            <div class="l-col l-col-3">
                                <div class="l-row">

                                    <div class="l-col l-col-6">
                                        <span class="colordetallei"> {{ movimientos[nl]['detalle']['fecha'] }} </span>
                                    </div>

                                    <div class="l-col l-col-6">
                                        <span class="colordetallei">  {{ movimientos[nl]['detalle']['refnumber'] }} </span>
                                    </div>

                                </div>
                            </div>
                            <div class="l-col l-col-4">
                                <span class="colordetallei">  {{ movimientos[nl]['detalle']['cliente'] }} </span>
                            </div>
                            <div class="l-col l-col-2">
                                <span class="colordetalled">  {{ movimientos[nl]['detalle']['subtotal'] }} </span>
                            </div>
                            <div class="l-col l-col-1">
                                <span class="colordetalled">  {{ movimientos[nl]['detalle']['iva'] }} </span>
                            </div>
                            <div class="l-col l-col-2">
                                <span class="colordetalled">  {{ movimientos[nl]['detalle']['total'] }} </span>
                            </div>
                        </div>                    
                    {% endif %}
                {% endfor %}

            </fieldset>

            <div class="l-row">

                <div class="l-col l-col-12"> 

                    <div class="form-group">

                        <input type="submit" value="Atras" id="submit" name="submit" class="btn btn-success btn-flat">

                    </div>

                </div>

            </div>


            </form>

        </div>
    </div>
</div>

<p style="page-break-after: always;">&nbsp;</p>
<p style="page-break-after: always;">&nbsp;</p>
<p style="page-break-before: always;">&nbsp;</p>

