<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <style>
    body { font-family: Arial, sans-serif; background: #f4f7fb; margin: 0; padding: 0; }
    .container { max-width: 600px; margin: 30px auto; background: #fff;
                 border-radius: 10px; overflow: hidden; box-shadow: 0 2px 12px rgba(0,0,0,.1); }
    .header { background: #1a56db; color: white; padding: 30px; text-align: center; }
    .header h1 { margin: 0; font-size: 22px; }
    .body { padding: 30px; color: #333; }
    .info-box { background: #f0f4ff; border-left: 4px solid #1a56db;
                padding: 15px 20px; border-radius: 6px; margin: 20px 0; }
    .info-row { display: flex; margin: 8px 0; }
    .info-label { font-weight: bold; min-width: 130px; color: #555; }
    .badge { display: inline-block; background: #d1fae5; color: #065f46;
             padding: 4px 12px; border-radius: 20px; font-size: 13px; font-weight: bold; }
    .footer { background: #f8fafc; padding: 20px; text-align: center;
              font-size: 12px; color: #888; border-top: 1px solid #eee; }
  </style>
</head>
<body>
<div class="container">
  <div class="header">
    <h1> BERDAI Centre de Dialyse</h1>
    <p style="margin:8px 0 0; opacity:.85">Confirmation de rendez-vous</p>
  </div>
  <div class="body">
    <p>Bonjour <strong>{{ $appointment->patient->user->name }}</strong>,</p>
    <p>Votre rendez-vous a été enregistré avec succès. <span class="badge"> Confirmé</span></p>

    <div class="info-box">
      <div class="info-row">
        <span class="info-label"> Médecin :</span>
        <span>Dr. {{ $appointment->medecin->user->name }}</span>
      </div>
      <div class="info-row">
        <span class="info-label"> Spécialité :</span>
        <span>{{ $appointment->medecin->specialite }}</span>
      </div>
      <div class="info-row">
        <span class="info-label"> Date :</span>
        <span>{{ $appointment->date_heure->format('d/m/Y') }}</span>
      </div>
      <div class="info-row">
        <span class="info-label"> Heure :</span>
        <span>{{ $appointment->date_heure->format('H:i') }}</span>
      </div>
      <div class="info-row">
        <span class="info-label"> Type :</span>
        <span>{{ ucfirst(str_replace('_', ' ', $appointment->type_seance)) }}</span>
      </div>
      @if($appointment->motif)
      <div class="info-row">
        <span class="info-label"> Motif :</span>
        <span>{{ $appointment->motif }}</span>
      </div>
      @endif
    </div>

    <p style="color:#666; font-size:14px;">
      ⚠️ En cas d'empêchement, merci d'annuler votre rendez-vous au moins 24h à l'avance.
    </p>
  </div>
  <div class="footer">
    BERDAI Centre de Dialyse &bull; Casablanca, Maroc<br>
    Cet email est envoyé automatiquement, merci de ne pas y répondre.
  </div>
</div>
</body>
</html>