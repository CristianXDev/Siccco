<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte Personal y Beneficios</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary-color: #f8fafc;
            --text-color: #1e293b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        body {
            background-color: #f1f5f9;
            color: var(--text-color);
            line-height: 1.6;
            padding: 20px;
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 20px;
            border-radius: 10px 10px 0 0;
            margin-bottom: 30px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        header h1 {
            font-size: 28px;
            font-weight: 600;
        }

        header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            margin-bottom: 25px;
            overflow: hidden;
        }

        .card-header {
            background-color: var(--primary-color);
            color: white;
            padding: 15px 20px;
            font-weight: 600;
            font-size: 18px;
        }

        .card-body {
            padding: 20px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }

        .info-item {
            margin-bottom: 15px;
        }

        .info-label {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 5px;
            font-weight: 500;
        }

        .info-value {
            font-size: 16px;
            font-weight: 500;
            padding: 8px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .benefits-list {
            list-style-type: none;
        }

        .benefit-item {
            display: flex;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid var(--border-color);
        }

        .benefit-item:last-child {
            border-bottom: none;
        }

        .benefit-icon {
            background-color: var(--primary-light);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            text-align:center;
            margin-right: 15px;
            flex-shrink: 0;
        }

         .benefit-icon span{
            margin-top:20px;
         }

        .benefit-content {
            flex-grow: 1;
        }

        .benefit-title {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .benefit-description {
            font-size: 14px;
            color: #64748b;
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .status-active {
            background-color: #dcfce7;
            color: #166534;
        }

        .status-inactive {
            background-color: #fee2e2;
            color: #991b1b;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <h1>Reporte Personal y Beneficios</h1>
            <p>Información detallada del usuario y beneficios disponibles</p>
        </header>

        <div class="card">
            <div class="card-header">Datos Personales</div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Nombres</div>
                        <div class="info-value">{{$persona->nombres}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Apellidos</div>
                        <div class="info-value">{{$persona->apellidos}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Cédula</div>
                        <div class="info-value">{{$persona->cedula}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Sexo</div>
                        <div class="info-value">@if($persona->sexo == 'M') Masculino @else Femenino @endif</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Fecha de Nacimiento</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($persona->fecha_nacimiento )->format('d-m-Y') }}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Estado Civil</div>
                        <div class="info-value">{{$persona->estado_civil}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Carga Familiar</div>
                        <div class="info-value">{{$persona->carga_familiar}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Datos de Contacto</div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Dirección</div>
                        <div class="info-value">{{$persona->direccion}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Teléfono</div>
                        <div class="info-value">{{$persona->telefono}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Correo Electrónico</div>
                        <div class="info-value">{{$persona->correo}}</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Información Socioeconómica</div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Ingresos Mensuales</div>
                        <div class="info-value">{{$persona->ingresos}}</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Tiene Carnet</div>
                        <div class="info-value">@if($persona->tiene_carnet==1) Sí @else No @endif</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Fecha de Registro</div>
                        <div class="info-value">{{ \Carbon\Carbon::parse($persona->fecha_registro)->format('d-m-Y') }}</div>

                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Beneficios Disponibles</div>
            <div class="card-body">
                <ul class="benefits-list">

                    @forelse($beneficios as $beneficio)

                    <li class="benefit-item">
                        <div class="benefit-icon"><span style="margin-top:5px;">{{ $loop->iteration }}</span></div>
                        <div class="benefit-content">
                            <div class="benefit-title">{{ $beneficio->tiposBeneficio->nombre }}</div>
                            <div class="benefit-description">{{ $beneficio->tiposBeneficio->descripcion }}.</div>
                        </div>
                        <span class="status-badge status-active">Activo</span>
                    </li>

                    @empty


                    <li class="benefit-item">
                        <div class="benefit-content">
                            <div class="benefit-title">Esta persona no cuenta con ningún beneficio</div>
                        </div>
                    </li>


                    @endforelse



                </ul>
            </div>
        </div>
        <!--
        <div class="footer">
            <p>Este reporte fue generado el 04/04/2025 a las 11:19 AM</p>
        </div>
        -->
    </div>
</body>
</html>