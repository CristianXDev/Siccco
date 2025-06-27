@extends('sources-dashboard')

@section('title')
<title>SICCO | Estadisticas</title>
@endsection

@section('content')

<div class="container-fluid">
  <div class="row p-3">

    <div class="col-md-6 mb-4">
      <div class="stat-cards-item card shadow-sm p-3">
        <div class="card-body text-center d-flex flex-column align-items-center">
          <h3 class="card-title mb-4" style="position: relative; right:16px;">Tipo de persona</h3>
          <div class="chart-container" style="position: relative; right:16px;  height:300px; width:100%; max-width:400px;">
            <canvas id="sexoChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="stat-cards-item card shadow-sm p-3">
        <div class="card-body text-center d-flex flex-column align-items-center">
          <h3 class="card-title mb-4" style="position: relative; right:16px;"">Estatus de Carnets</h3>
          <div class="chart-container" style="position: relative; height:300px; width:100%; max-width:400px;">
            <canvas id="estatusCarnetsChart"></canvas>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-4">
      <div class="stat-cards-item card shadow-sm p-3 h-100">
        <div class="card-body text-center d-flex flex-column align-items-center">
          <h3 class="card-title mb-4">Top 5 Beneficios</h3>
          <div class="chart-container" style="position: relative; height:250px; width:100%;">
            <canvas id="beneficiosChart"></canvas>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>

</div>
</div>

<script>

  document.addEventListener('DOMContentLoaded', function() {
// Configuración de colores para cada gráfica
    const colorSets = {
      sexoChart: {
        background: [
'rgba(54, 162, 235, 0.7)',  // Azul para hombres
'rgba(255, 99, 132, 0.7)'    // Rosa para mujeres
],
border: [
  'rgba(54, 162, 235, 1)',
  'rgba(255, 99, 132, 1)'
]
},
estatusCarnetsChart: {
  background: [
'rgba(75, 192, 192, 0.7)',   // Verde agua
'rgba(153, 102, 255, 0.7)',  // Morado
'rgba(255, 159, 64, 0.7)',    // Naranja
'rgba(255, 206, 86, 0.7)',    // Amarillo
'rgba(201, 203, 207, 0.7)'    // Gris
],
border: [
  'rgba(75, 192, 192, 1)',
  'rgba(153, 102, 255, 1)',
  'rgba(255, 159, 64, 1)',
  'rgba(255, 206, 86, 1)',
  'rgba(201, 203, 207, 1)'
]
},
beneficiosChart: {
  background: [
'rgba(255, 99, 71, 0.7)',    // Rojo coral
'rgba(46, 139, 87, 0.7)',     // Verde mar
'rgba(106, 90, 205, 0.7)',    // Azul pizarra
'rgba(218, 165, 32, 0.7)',    // Oro
'rgba(148, 0, 211, 0.7)'      // Violeta oscuro
],
border: [
  'rgba(255, 99, 71, 1)',
  'rgba(46, 139, 87, 1)',
  'rgba(106, 90, 205, 1)',
  'rgba(218, 165, 32, 1)',
  'rgba(148, 0, 211, 1)'
]
}
};

// Gráfica de Personas por Sexo
const sexoChart = new Chart(
  document.getElementById('sexoChart').getContext('2d'),
  {
    type: 'doughnut',
    data: {
      labels: ['Hombres', 'Mujeres'],
      datasets: [{
        data: [{{ $hombres }}, {{ $mujeres }}],
        backgroundColor: colorSets.sexoChart.background,
        borderColor: colorSets.sexoChart.border,
        borderWidth: 2
      }]
    },
    options: getChartOptions('personas')
  }
  );

// Gráfica de Estatus de Carnets
const estatusChart = new Chart(
  document.getElementById('estatusCarnetsChart').getContext('2d'),
  {
    type: 'doughnut',
    data: {
      labels: {!! json_encode(array_keys($estatusCarnets)) !!},
      datasets: [{
        data: {!! json_encode(array_values($estatusCarnets)) !!},
        backgroundColor: colorSets.estatusCarnetsChart.background,
        borderColor: colorSets.estatusCarnetsChart.border,
        borderWidth: 2
      }]
    },
    options: getChartOptions('carnets')
  }
  );

// Gráfica de Top 5 Beneficios
const beneficiosChart = new Chart(
  document.getElementById('beneficiosChart').getContext('2d'),
  {
    type: 'doughnut',
    data: {
      labels: {!! json_encode(array_keys($topBeneficios)) !!},
      datasets: [{
        data: {!! json_encode(array_values($topBeneficios)) !!},
        backgroundColor: colorSets.beneficiosChart.background,
        borderColor: colorSets.beneficiosChart.border,
        borderWidth: 2
      }]
    },
    options: getChartOptions('beneficios')
  }
  );

// Función para opciones comunes de las gráficas
function getChartOptions(type) {
  return {
    responsive: true,
    maintainAspectRatio: false,
    cutout: '70%',
    plugins: {
      legend: {
        position: 'bottom',
        align: 'center',
        labels: {
          padding: 20,
          usePointStyle: true,
          pointStyle: 'circle'
        }
      },
      tooltip: {
        callbacks: {
          label: function(context) {
            const label = context.label || '';
            const value = context.raw;
            let suffix = '';

            if (type === 'personas') suffix = ' persona' + (value !== 1 ? 's' : '');
            else if (type === 'carnets') suffix = ' carnet' + (value !== 1 ? 's' : '');
            else suffix = ' vez' + (value !== 1 ? 'es' : '');

            return `${label}: ${value}${suffix}`;
          }
        }
      }
    },
    animation: {
      animateScale: true,
      animateRotate: true
    }
  };
}
});

</script>

@endsection