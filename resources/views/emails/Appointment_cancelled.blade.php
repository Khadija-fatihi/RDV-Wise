<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: Arial, sans-serif; background: #f4f7fb; margin: 0; padding: 0; }
    .container { max-width: 600px; margin: 30px auto; background: #fff;
                 border-radius: 10px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,.1); }
    .header { background: #dc2626; color: white; padding: 30px; text-align: center; }
    .header h1 { margin: 0; font-size: 22px; }
    .body { padding: 30px; color: #333; }
    .info-box { background: #fff5f5; border-left: 4px solid #dc2626;
                padding: 15px 20px; border-radius: 6px; margin: 20px 0; }
    .info-row { display: flex; margin: 8px 0; }
    .info-label { font-weight: bold; min-width: 130px; color: #555; }
    .footer { background: #f8fafc; padding: 20px; text-align: center;
              font-size: 12px; color: #888; border-top: 1px solid #eee; }
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1>🏥 BERDAI Centre de Dialyse</h1>
    <p style="margin:8px 0 0; opacity:.85">Annulation de rendez-vous</p>
  </div>
  <div class="body">
    <p>Bonjour <strong>{{ $appointment->patient->user->name }}</strong>,</p>
    <p>Nous vous informons que votre rendez-vous a été annulé.</p>

    <div class="info-box">
      <div class="info-row">
        <span class="info-label"> Médecin :</span>
        <span>Dr. {{ $appointment->medecin->user->name }}</span>
      </div>
      <div class="info-row">
        <span class="info-label"> Date :</span>
        <span>{{ $appointment->date_heure->format('d/m/Y à H:i') }}</span>
      </div>
      @if($appointment->notes_medecin)
      <div class="info-row">
        <span class="info-label"> Raison :</span>
        <span>{{ $appointment->notes_medecin }}</span>
      </div>
      @endif
    </div>

    <p>Pour reprendre un rendez-vous, connectez-vous à votre espace patient.</p>
  </div>
  <div class="footer">
    BERDAI Centre de Dialyse &bull; Casablanca, Maroc
  </div>
</div>
</body>
</html>