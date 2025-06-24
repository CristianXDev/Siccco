<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Solicitud Completada</title>
    <style>
        :root {
            --primary-color: #2563eb;
            --primary-light: #3b82f6;
            --primary-dark: #1d4ed8;
            --secondary-color: #f8fafc;
            --text-color: #1e293b;
            --border-color: #e2e8f0;
            --success-color: #10b981;
            --success-light: #d1fae5;
            --warning-color: #f59e0b;
            --warning-light: #fef3c7;
            --danger-color: #ef4444;
            --danger-light: #fee2e2;
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
            position: relative;
            overflow: hidden;
        }

        .status-ribbon {
            position: absolute;
            top: 15px;
            right: -30px;
            background-color: var(--success-color);
            color: white;
            padding: 5px 40px;
            transform: rotate(45deg);
            font-weight: 600;
            font-size: 14px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 5px;
        }

        header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .meta-info {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 14px;
            background-color: rgba(255, 255, 255, 0.1);
            padding: 10px;
            border-radius: 5px;
        }

        .meta-item {
            display: flex;
            align-items: center;
        }

        .meta-label {
            font-weight: 500;
            margin-right: 5px;
            opacity: 0.8;
        }

        .meta-value {
            font-weight: 600;
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header-right {
            font-size: 14px;
            font-weight: normal;
            opacity: 0.9;
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

        .description-box {
            background-color: var(--secondary-color);
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
            border-left: 4px solid var(--primary-color);
        }

        .description-title {
            font-weight: 600;
            margin-bottom: 10px;
            color: var(--primary-dark);
        }

        .description-content {
            font-size: 15px;
            white-space: pre-line;
        }

        .timeline {
            position: relative;
            margin: 20px 0;
            padding-left: 30px;
        }

        .timeline::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            width: 4px;
            height: 100%;
            background-color: var(--primary-light);
            border-radius: 4px;
        }

        .timeline-item {
            position: relative;
            margin-bottom: 25px;
            padding-bottom: 15px;
        }

        .timeline-item:last-child {
            margin-bottom: 0;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: -34px;
            top: 0;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            background-color: white;
            border: 3px solid var(--primary-color);
        }

        .timeline-item.success::before {
            border-color: var(--success-color);
        }

        .timeline-date {
            font-size: 14px;
            color: #64748b;
            margin-bottom: 5px;
        }

        .timeline-title {
            font-weight: 600;
            margin-bottom: 5px;
            color: var(--primary-dark);
        }

        .timeline-content {
            font-size: 15px;
            background-color: var(--secondary-color);
            padding: 10px 15px;
            border-radius: 5px;
        }

        .timeline-item.success .timeline-content {
            background-color: var(--success-light);
        }

        .timeline-item.warning .timeline-content {
            background-color: var(--warning-light);
        }

        .status-badge {
            display: inline-block;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
        }

        .status-completed {
            background-color: var(--success-light);
            color: #166534;
        }

        .status-pending {
            background-color: var(--warning-light);
            color: #92400e;
        }

        .status-rejected {
            background-color: var(--danger-light);
            color: #991b1b;
        }

        .approval-section {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid var(--border-color);
        }

        .signature-box {
            width: 45%;
            text-align: center;
        }

        .signature-line {
            height: 1px;
            background-color: var(--text-color);
            margin: 10px 0;
        }

        .signature-name {
            font-weight: 600;
        }

        .signature-title {
            font-size: 14px;
            color: #64748b;
        }

        .footer {
            text-align: center;
            margin-top: 30px;
            color: #64748b;
            font-size: 14px;
        }

        .print-button {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            margin-top: 20px;
            display: block;
            margin: 20px auto;
        }

        .print-button:hover {
            background-color: var(--primary-dark);
        }

        @media (max-width: 768px) {
            .info-grid {
                grid-template-columns: 1fr;
            }
            
            .meta-info {
                flex-direction: column;
                gap: 10px;
            }
            
            .approval-section {
                flex-direction: column;
                gap: 20px;
            }
            
            .signature-box {
                width: 100%;
            }
        }

        @media print {
            body {
                background-color: white;
            }
            
            .container {
                max-width: 100%;
            }
            
            .card {
                box-shadow: none;
                border: 1px solid var(--border-color);
                break-inside: avoid;
            }
            
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="status-ribbon">COMPLETADA</div>
            <h1>Solicitud de Proyecto Comunitario</h1>
            <p>Propuesta para mejoramiento de infraestructura local</p>
            
            <div class="meta-info">
                <div class="meta-item">
                    <span class="meta-label">ID Solicitud:</span>
                    <span class="meta-value">2</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Tipo:</span>
                    <span class="meta-value">Proyecto Comunitario</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Fecha Creación:</span>
                    <span class="meta-value">07/04/2025</span>
                </div>
                <div class="meta-item">
                    <span class="meta-label">Fecha Cierre:</span>
                    <span class="meta-value">07/04/2025</span>
                </div>
            </div>
        </header>

        <div class="card">
            <div class="card-header">
                Información de la Solicitud
                <span class="card-header-right">Estado: <span class="status-badge status-completed">Completada</span></span>
            </div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Solicitante</div>
                        <div class="info-value">Juan Carlos Rodríguez Méndez</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">ID Persona</div>
                        <div class="info-value">2</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Responsable Seguimiento</div>
                        <div class="info-value">María Fernanda López</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">ID Responsable</div>
                        <div class="info-value">1</div>
                    </div>
                </div>
                
                <div class="description-box">
                    <div class="description-title">Descripción de la Solicitud</div>
                    <div class="description-content">
                        Solicitud para la implementación de un proyecto de mejoramiento de la infraestructura comunitaria en el barrio San Francisco. El proyecto incluye la reparación de aceras, instalación de iluminación LED en áreas comunes y la creación de un pequeño parque infantil para los residentes del sector.
                    </div>
                </div>
                
                <div class="description-box">
                    <div class="description-title">Observaciones</div>
                    <div class="description-content">
                        El proyecto fue ejecutado satisfactoriamente con la participación activa de los miembros de la comunidad. Se completaron todas las fases planificadas y se realizó la entrega formal a los representantes del barrio San Francisco.
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-header">Seguimiento y Aprobación</div>
            <div class="card-body">
                <div class="timeline">
                    <div class="timeline-item">
                        <div class="timeline-date">07/04/2025 - 09:15 AM</div>
                        <div class="timeline-title">Recepción de Solicitud</div>
                        <div class="timeline-content">
                            Se recibió la solicitud de proyecto comunitario por parte del Sr. Juan Carlos Rodríguez. Se asignó a María Fernanda López como responsable del seguimiento.
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-date">10/04/2025 - 11:30 AM</div>
                        <div class="timeline-title">Evaluación Inicial</div>
                        <div class="timeline-content">
                            Se realizó la evaluación inicial del proyecto. Se determinó la viabilidad técnica y se solicitaron detalles adicionales sobre el presupuesto requerido.
                        </div>
                    </div>
                    
                    <div class="timeline-item warning">
                        <div class="timeline-date">15/04/2025 - 02:45 PM</div>
                        <div class="timeline-title">Revisión de Presupuesto</div>
                        <div class="timeline-content">
                            Se recibió el presupuesto detallado. Se solicitaron ajustes en algunos rubros para optimizar los recursos disponibles.
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-date">20/04/2025 - 10:00 AM</div>
                        <div class="timeline-title">Aprobación del Proyecto</div>
                        <div class="timeline-content">
                            El comité evaluador aprobó el proyecto con un presupuesto total de $12,500. Se autorizó el inicio de las actividades a partir del 25/04/2025.
                        </div>
                    </div>
                    
                    <div class="timeline-item">
                        <div class="timeline-date">25/04/2025 - 08:30 AM</div>
                        <div class="timeline-title">Inicio de Ejecución</div>
                        <div class="timeline-content">
                            Se dio inicio formal a la ejecución del proyecto con la participación de 15 miembros de la comunidad y el equipo técnico asignado.
                        </div>
                    </div>
                    
                    <div class="timeline-item success">
                        <div class="timeline-date">07/05/2025 - 04:00 PM</div>
                        <div class="timeline-title">Finalización y Entrega</div>
                        <div class="timeline-content">
                            Se completó satisfactoriamente la ejecución del proyecto. Se realizó la entrega formal a los representantes de la comunidad y se firmó el acta de recepción.
                        </div>
                    </div>
                </div>
                
                <div class="approval-section">
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-name">Juan Carlos Rodríguez Méndez</div>
                        <div class="signature-title">Solicitante</div>
                    </div>
                    
                    <div class="signature-box">
                        <div class="signature-line"></div>
                        <div class="signature-name">María Fernanda López</div>
                        <div class="signature-title">Responsable de Seguimiento</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card">
            <div class="card-header">Resultados del Proyecto</div>
            <div class="card-body">
                <div class="info-grid">
                    <div class="info-item">
                        <div class="info-label">Presupuesto Asignado</div>
                        <div class="info-value">$12,500.00</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Presupuesto Ejecutado</div>
                        <div class="info-value">$12,350.75</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Beneficiarios Directos</div>
                        <div class="info-value">150 familias</div>
                    </div>
                    <div class="info-item">
                        <div class="info-label">Duración del Proyecto</div>
                        <div class="info-value">12 días</div>
                    </div>
                </div>
                
                <div class="description-box">
                    <div class="description-title">Impacto del Proyecto</div>
                    <div class="description-content">
                        El proyecto ha mejorado significativamente la calidad de vida de los residentes del barrio San Francisco. La nueva iluminación LED ha incrementado la seguridad en un 40%, mientras que el parque infantil ahora es utilizado por aproximadamente 45 niños diariamente. Las aceras reparadas han mejorado la accesibilidad para personas con movilidad reducida y adultos mayores.
                    </div>
                </div>
            </div>
        </div>

        <div class="footer">
            <p>Este reporte fue generado el 07/04/2025 a las 03:45 PM</p>
            <p>Documento oficial - Sistema de Gestión de Solicitudes Comunitarias</p>
        </div>
        
        <button class="print-button" onclick="window.print()">Imprimir Reporte</button>
    </div>
</body>
</html>