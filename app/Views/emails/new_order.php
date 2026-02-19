<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Nueva Orden</title>
</head>

<body style="margin:0; padding:0; background-color:#f4f4f4; font-family: Arial, sans-serif;">

    <table width="100%" cellpadding="0" cellspacing="0" style="background:#f4f4f4; padding:20px 0;">
        <tr>
            <td align="center">

                <!-- Contenedor principal -->
                <table width="600" cellpadding="0" cellspacing="0" style="background:#ffffff; border-radius:8px; overflow:hidden;">

                    <!-- Header -->
                    <tr>
                        <td style="background:#c62828; padding:20px; text-align:center; color:#ffffff;">
                            <h2 style="margin:0;">🍕 Nueva Orden Recibida</h2>
                            <p style="margin:5px 0 0 0;">La Cubana Pizzería</p>
                        </td>
                    </tr>

                    <!-- Contenido -->
                    <tr>
                        <td style="padding:25px;">

                            <h3 style="margin-top:0;">Detalles de la Orden</h3>

                            <table width="100%" cellpadding="5" cellspacing="0" style="font-size:14px;">
                                <tr>
                                    <td><strong>ID de Orden:</strong></td>
                                    <td><?= esc($order->order_id) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Cliente:</strong></td>
                                    <td><?= esc($order->client_name) ?></td>
                                </tr>
                                <tr>
                                    <td><strong>Teléfono:</strong></td>
                                    <td>
                                        <a href="tel:<?= esc($order->client_phone) ?>"
                                            style="color:#c62828; text-decoration:none; font-weight:bold;">
                                            <?= esc($order->client_phone) ?>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td><strong>Total:</strong></td>
                                    <td style="font-size:16px; font-weight:bold; color:#2e7d32;">
                                        $<?= esc($order->total_price) ?>
                                    </td>
                                </tr>
                            </table>

                            <hr style="margin:25px 0; border:none; border-top:1px solid #eeeeee;">

                            <h3>Productos Ordenados</h3>

                            <table width="100%" cellpadding="8" cellspacing="0" style="border-collapse:collapse; font-size:14px;">
                                <?php foreach ($order->products_readable as $product): ?>
                                    <tr style="border-bottom:1px solid #eeeeee;">
                                        <td><?= esc($product) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </table>

                            <!-- Botón llamar -->
                            <div style="text-align:center; margin-top:30px;">
                                <a href="tel:<?= esc($order->client_phone) ?>"
                                    style="background:#c62828; color:#ffffff; padding:12px 25px; 
                                          text-decoration:none; border-radius:5px; 
                                          display:inline-block; font-weight:bold;">
                                    📞 Llamar al Cliente
                                </a>
                            </div>

                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="background:#fafafa; padding:15px; text-align:center; font-size:12px; color:#777;">
                            Este correo fue generado automáticamente por el sistema de pedidos.<br>
                            © <?= date('Y') ?> La Cubana Pizzería
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>