<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carnet de Identificación</title>
    <style>
        body {
            background-color: #f1f5f9;
            color: #1e293b;
            line-height: 1.6;
            padding: 20px;
            font-family: 'Arial', 'Helvetica', sans-serif;
            margin: 0;
        }

        .container {
            width: 100%;
            max-width: 1000px;
            margin: 0 auto;
        }

        .card-container {
            width: 100%;
            text-align: center;
        }

        .id-card {
            width: 350px;
            height: 220px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 0 auto 20px auto;
        }

        .id-card-back {
            width: 350px;
            height: 220px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            position: relative;
            margin: 0 auto 20px auto;
        }

        .card-header {
            background-color: #2563eb;
            color: white;
            padding: 12px 15px;
            height: 20px;
        }

        .card-header-title {
            float: left;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .card-number {
            float: right;
            font-size: 12px;
            background-color: rgba(255, 255, 255, 0.2);
            padding: 3px 8px;
            border-radius: 4px;
        }

        .card-body {
            padding: 15px;
            height: 130px;
        }

        .photo-section {
            float: left;
            width: 90px;
            margin-right: 15px;
        }

        .photo {
            width: 90px;
            height: 110px;
            background-color: #e2e8f0;
            border: 1px solid #cbd5e1;
            margin-bottom: 8px;
            text-align: center;
            overflow: hidden;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .info-section {
            float: left;
            width: calc(100% - 110px);
        }

        .info-item {
            margin-bottom: 6px;
            clear: both;
        }

        .info-label {
            font-size: 10px;
            color: #64748b;
            text-transform: uppercase;
            font-weight: 600;
            margin-bottom: 1px;
        }

        .info-value {
            font-size: 13px;
            font-weight: 500;
        }

        .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #3b82f6;
            color: white;
            padding: 8px 15px;
            font-size: 11px;
            height: 15px;
        }

        .footer-left {
            float: left;
        }

        .footer-right {
            float: right;
        }

        .back-header {
            background-color: #2563eb;
            color: white;
            padding: 12px 15px;
            text-align: center;
            height: 20px;
        }

        .back-header h2 {
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }

        .back-body {
            padding: 15px;
            height: 130px;
            text-align: center;
        }

        .qr-container {
            width: 130px;
            height: 130px;
            margin: 0 auto 15px auto;
        }

        .qr-code {
            width: 130px;
            height: 130px;
            background-color: #e2e8f0;
            border: 1px solid #cbd5e1;
            text-align: center;
            margin: 0 auto;
        }

        .qr-code img {
            width: 100%;
            height: 100%;
        }

        .dates-container {
            width: 80%;
            margin: 0 auto;
            background-color: #f1f5f9;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #e2e8f0;
        }

        .date-row {
            margin-bottom: 5px;
        }

        .date-row:last-child {
            margin-bottom: 0;
        }

        .date-label {
            font-size: 12px;
            font-weight: 600;
            color: #64748b;
            display: inline-block;
            width: 45%;
            text-align: right;
            padding-right: 10px;
        }

        .date-value {
            font-size: 12px;
            font-weight: 600;
            color: #1e293b;
            display: inline-block;
            width: 45%;
            text-align: left;
        }

        .verification-text {
            font-size: 11px;
            color: #64748b;
            margin-top: 10px;
            font-style: italic;
        }

        .signature-section {
            width: 150px;
            margin: 15px auto 0 auto;
        }

        .signature-line {
            width: 100%;
            height: 1px;
            background-color: #64748b;
            margin-bottom: 5px;
        }

        .signature-text {
            font-size: 10px;
            color: #64748b;
            text-align: center;
        }

        .print-button {
            background-color: #2563eb;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            margin: 20px auto;
            display: block;
        }

        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        table.info-table {
            margin-bottom: 10px;
        }

        table.info-table td {
            vertical-align: top;
            padding: 0 0 6px 0;
        }

        @media print {
            body {
                background-color: white;
                padding: 0;
            }
            
            .container {
                max-width: 100%;
            }
            
            .id-card, .id-card-back {
                page-break-after: always;
                box-shadow: none;
                border: 1px solid #e2e8f0;
                margin: 0 auto;
            }
            
            .print-button {
                display: none;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card-container">
            <!-- Frente del Carnet -->
            <div class="id-card">
                <div class="card-header clearfix">
                    <div class="card-header-title">CARNET DE BENEFICIARIO</div>
                    <div class="card-number">No. 1743987654</div>
                </div>
                <div class="card-body clearfix">
                    <div class="photo-section">
                        <div class="photo">
                            <img src="/placeholder.svg?height=110&width=90" alt="Foto del titular">
                        </div>
                    </div>
                    <div class="info-section">
                        <table class="info-table">
                            <tr>
                                <td colspan="2">
                                    <div class="info-label">Nombres y Apellidos</div>
                                    <div class="info-value">Juan Carlos Rodríguez Méndez</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="info-label">Cédula</div>
                                    <div class="info-value">1234567890</div>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="info-label">Tipo de Beneficio</div>
                                    <div class="info-value">Bono de Desarrollo Humano</div>
                                </td>
                            </tr>
                            <tr>
                                <td width="50%">
                                    <div class="info-label">Fecha de Emisión</div>
                                    <div class="info-value">07/04/2025</div>
                                </td>
                                <td width="50%">
                                    <div class="info-label">Fecha de Vencimiento</div>
                                    <div class="info-value">07/04/2026</div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="footer-left">ID: QR-1743987654-5c8</div>
                    <div class="footer-right">Estado: Activo</div>
                </div>
            </div>

            <!-- Reverso del Carnet -->
            <div class="id-card-back">
                <div class="back-header">
                    <h2>VERIFICACIÓN DE IDENTIDAD</h2>
                </div>
                <div class="back-body">
                    <div class="qr-container">
                        <div class="qr-code">
                            <img src="/placeholder.svg?height=130&width=130" alt="Código QR">
                        </div>
                    </div>
                    
                    <div class="dates-container">
                        <div class="date-row">
                            <span class="date-label">Emisión:</span>
                            <span class="date-value">07/04/2025</span>
                        </div>
                        <div class="date-row">
                            <span class="date-label">Vencimiento:</span>
                            <span class="date-value">07/04/2026</span>
                        </div>
                    </div>
                    
                    <div class="verification-text">
                        Escanee el código QR para verificar la autenticidad de este carnet
                    </div>
                    
                    <div class="signature-section">
                        <div class="signature-line"></div>
                        <div class="signature-text">Firma del Titular</div>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <div class="footer-left">Documento oficial</div>
                    <div class="footer-right">v.1.0</div>
                </div>
            </div>
            
            <button class="print-button" onclick="window.print()">Imprimir Carnet</button>
        </div>
    </div>
</body>
</html>