<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Ticket #<?= esc($order->order_id); ?></title>

    <style>
        @media print {
            button {
                display: none;
            }
        }

        body {
            font-family: monospace;
            width: 320px;
            margin: auto;
            font-size: 14px;
        }

        .ticket {
            padding: 10px;
        }

        .center {
            text-align: center;
        }

        .right {
            text-align: right;
        }

        .line {
            border-top: 1px dashed #000;
            margin: 8px 0;
        }

        .total {
            font-size: 18px;
            font-weight: bold;
        }

        .small {
            font-size: 12px;
        }

        .btn-print{
            margin-top: 20px;
            margin-left: 100px;
            padding: 8px 12px;
            background-color: #000;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="ticket">

        <div class="center">
            <h2 style="margin:0;">LA CUBANA PIZZERIA</h2>
            <div class="small">Pizzería Artesanal</div>
            <div class="small">Ticket de Facturación</div>
        </div>

        <div class="line"></div>

        <div>
            <div><strong>Orden:</strong> #<?= esc($order->order_id); ?></div>
            <div><strong>Fecha:</strong>
                <?= date('d/m/Y H:i', strtotime($order->created_at ?? 'now')); ?>
            </div>
        </div>

        <div class="line"></div>

        <div>
            <div><strong>Cliente:</strong></div>
            <div><?= esc($order->client_name); ?></div>
            <div class="small"><?= esc($order->client_phone); ?></div>
        </div>

        <div class="line"></div>

        <div>
            <strong>Productos</strong>
            <div class="line"></div>

            <?php if (!empty($order->products_readable)) { ?>
                <?php foreach ($order->products_readable as $item) { ?>
                    <div><?= esc($item); ?></div>
                <?php } ?>
            <?php } else { ?>
                <div class="small">Sin productos</div>
            <?php } ?>
        </div>

        <div class="line"></div>

        <div class="right total">
            TOTAL: $<?= number_format((float)$order->total_price, 2); ?>
        </div>

        <div class="line"></div>

        <div class="center small">
            ¡Gracias por su compra! 🍕
        </div>

        <button onclick="window.print()" class="btn-print">🖨 Imprimir</button>

    </div>

    <script>
        window.onload = function() {
            window.print();
        };
    </script>

</body>

</html>