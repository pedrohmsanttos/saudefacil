<div class="col-md-12">
    <h2>Consulta Médica</h2>
    <hr>
    <div class="row">
        <div class="col-md-12">
        	<div class="col-md-6"><p><strong>DIA:</strong> <?= $consultation->day->format('d/m/Y') . " " . $consultation->hour ?> </div>
        </div>
        <div class="col-md-12">
        	<div class="col-md-6"><p><strong>PACIENTE:</strong> <?= $consultation->user->name ?> </div>
        </div>

        <div class="col-md-12">
        	<div class="col-md-6"><p><strong>ESPECIALIDADE:</strong> <?= $consultation->specialty->name ?> </div>
        </div>

        <div class="col-md-12">
        	<div class="col-md-6"><p><strong>UNIDADE:</strong> <?= $consultation->unit->name ?> </div>
        </div>

        <div class="col-md-12">
        	<div class="col-md-6"><p><strong>OBSERVAÇÃO:</strong> <?= $consultation->note ?> </div>
        </div>
    </div>
</div>