@extends('layouts.app')

@section('title', 'AI Smart Diagnostic | Smart santé')

@section('head')
<link href="https://fonts.googleapis.com" rel="preconnect"/>
<link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect"/>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;display=swap" rel="stylesheet"/>
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<script id="tailwind-config">
      tailwind.config = {
        darkMode: "class",
        theme: {
          extend: {
            colors: {
                    "surface-variant": "#d8e3fb",
                    "inverse-on-surface": "#ecf1ff",
                    "tertiary-fixed-dim": "#c3c7cb",
                    "on-surface-variant": "#434655",
                    "on-secondary-fixed": "#00201c",
                    "on-surface": "#111c2d",
                    "secondary-fixed-dim": "#59daca",
                    "surface-bright": "#f9f9ff",
                    "background": "#f9f9ff",
                    "on-tertiary-container": "#edf1f5",
                    "error-container": "#ffdad6",
                    "on-primary": "#ffffff",
                    "on-tertiary-fixed": "#171c1f",
                    "primary-fixed-dim": "#b4c5ff",
                    "on-tertiary": "#ffffff",
                    "outline": "#737686",
                    "surface-container": "#e7eeff",
                    "tertiary": "#515659",
                    "on-secondary": "#ffffff",
                    "on-secondary-container": "#007167",
                    "on-secondary-fixed-variant": "#005048",
                    "surface": "#f9f9ff",
                    "surface-container-low": "#f0f3ff",
                    "primary-container": "#2563eb",
                    "inverse-primary": "#b4c5ff",
                    "tertiary-fixed": "#dfe3e7",
                    "secondary": "#006a61",
                    "on-primary-container": "#eeefff",
                    "outline-variant": "#c3c6d7",
                    "inverse-surface": "#263143",
                    "on-tertiary-fixed-variant": "#43474b",
                    "secondary-container": "#78f7e6",
                    "tertiary-container": "#696e71",
                    "error": "#ba1a1a",
                    "surface-container-high": "#dee8ff",
                    "primary-fixed": "#dbe1ff",
                    "surface-container-lowest": "#ffffff",
                    "on-primary-fixed": "#00174b",
                    "on-background": "#111c2d",
                    "primary": "#004ac6",
                    "surface-container-highest": "#d8e3fb",
                    "surface-tint": "#0053db",
                    "on-error": "#ffffff",
                    "on-primary-fixed-variant": "#003ea8",
                    "secondary-fixed": "#78f7e6",
                    "surface-dim": "#cfdaf2",
                    "on-error-container": "#93000a"
            },
            borderRadius: {
                    DEFAULT: "0.25rem",
                    lg: "0.5rem",
                    xl: "0.75rem",
                    full: "9999px"
            },
            spacing: {
                    "stack-md": "1rem",
                    "stack-sm": "0.5rem",
                    "container-max": "768px",
                    "stack-lg": "2rem",
                    "inset-base": "1.25rem",
                    "gutter": "1.5rem"
            },
            fontFamily: {
                    "label-sm": ["Manrope"],
                    "body-lg": ["Manrope"],
                    "headline-lg-mobile": ["Manrope"],
                    "label-md": ["Manrope"],
                    "headline-lg": ["Manrope"],
                    "headline-md": ["Manrope"],
                    "body-md": ["Manrope"]
            },
            fontSize: {
                    "label-sm": ["12px", { "lineHeight": "16px", "fontWeight": "500" }],
                    "body-lg": ["18px", { "lineHeight": "28px", "fontWeight": "400" }],
                    "headline-lg-mobile": ["24px", { "lineHeight": "32px", "letterSpacing": "-0.01em", "fontWeight": "700" }],
                    "label-md": ["14px", { "lineHeight": "20px", "letterSpacing": "0.05em", "fontWeight": "600" }],
                    "headline-lg": ["32px", { "lineHeight": "40px", "letterSpacing": "-0.02em", "fontWeight": "700" }],
                    "headline-md": ["20px", { "lineHeight": "28px", "fontWeight": "600" }],
                    "body-md": ["16px", { "lineHeight": "24px", "fontWeight": "400" }]
            }
          },
        },
      }
    </script>
<style>
        body { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
        }
        .tap-highlight-transparent { -webkit-tap-highlight-color: transparent; }
        .chip-transition {
            transition: all 0.2s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .content-canvas {
            max-width: 768px;
            margin: 0 auto;
        }
        .animate-fade-in {
            animation: fadeIn 0.35s ease-out both;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(12px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
@endsection

@section('content')
<main class="pt-20 pb-32 min-h-screen flex flex-col items-center px-4 md:px-0 bg-surface">
    <div class="content-canvas w-full space-y-stack-lg flex flex-col justify-center min-h-[calc(100vh-13rem)]">
        <section class="text-center space-y-stack-sm animate-fade-in">
            <h2 class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface">AI Smart Diagnostic</h2>
            <p class="font-body-md text-body-md text-on-surface-variant max-w-md mx-auto px-4">
                Describe your symptoms with precision. Our Smart santé  will guide you to the right care path.
            </p>
        </section>
        <section class="space-y-stack-md px-2">
            <div class="flex items-center justify-between">
                <h3 class="font-label-md text-label-md text-on-surface-variant tracking-widest uppercase">COMMON SYMPTOMS</h3>
            </div>
            <div class="flex flex-wrap gap-3">
                <button type="button" data-symptom="Troubles hormonaux" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">Troubles hormonaux</span>
                </button>
                <button type="button" data-symptom="Fever" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">Fever</span>
                </button>
                <button type="button" data-symptom="diabète" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">diabète</span>
                </button>
                <button type="button" data-symptom="Problèmes de vision" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">Problèmes de vision</span>
                </button>
                <button type="button" data-symptom="Nausea" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">Nausea</span>
                </button>
                <button type="button" data-symptom="Chest Pain" class="chip-transition px-5 py-2.5 rounded-full bg-surface-container-highest text-on-surface-variant border border-outline-variant hover:bg-surface-container-high active:scale-95">
                    <span class="font-label-md text-label-md">Chest Pain</span>
                </button>
            </div>
          
        </section>
        <section class="relative px-1">
            <div class="relative group">
                <div class="absolute inset-y-0 left-5 flex items-center pointer-events-none text-on-surface-variant group-focus-within:text-primary transition-colors">
                    <span class="material-symbols-outlined">search</span>
                </div>
                <input id="symptom-search" class="w-full h-20 pl-14 pr-64 rounded-full bg-surface-container-low border border-outline-variant focus:border-primary focus:ring-0 focus:bg-surface-container-high transition-all font-body-md text-body-md placeholder:text-on-surface-variant/50 shadow-sm" placeholder="Recherchez vos symptômes (ex. maux de tête...)" type="text">
                <div class="absolute inset-y-2 right-2">
                    <button id="analyze-button" type="button" class="h-full px-6 bg-primary-container text-on-primary-container rounded-full flex items-center justify-center gap-3 font-label-md text-label-md shadow-lg shadow-primary/20 active:scale-[0.98] transition-all hover:brightness-110">
                        <span class="material-symbols-outlined">analytics</span>
                        <span>Analyser mes symptômes</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="px-2">
            <div id="selected-symptoms" class="mt-4 flex flex-wrap gap-2"></div>
            <div id="scroll-hint" class="mt-4 hidden items-center justify-center gap-2 rounded-full bg-surface-container-lowest px-4 py-3 text-sm text-on-surface-variant shadow-sm">
                <span class="material-symbols-outlined text-lg animate-bounce">expand_more</span>
                <span></span>
            </div>
        </section>
        <section class="px-2">
            <div id="analysis-result" class="mt-4 hidden rounded-3xl border border-outline-variant bg-white p-6 shadow-[0_12px_32px_rgba(0,74,198,0.04)]">
                <div class="flex items-center gap-3 mb-6">
                    <span class="p-3 rounded-2xl bg-primary/10 text-primary material-symbols-outlined">psychology</span>
                    <div>
                        <p class="text-[11px] font-semibold uppercase tracking-widest text-on-surface-variant mb-1">AI Conversation</p>
                        <h3 class="text-xl font-bold text-on-surface">Votre diagnostic personnalisé</h3>
                    </div>
                </div>
                <div id="chat-messages" class="space-y-4 max-h-[28rem] overflow-y-auto">
                    <div class="rounded-3xl bg-surface-container-lowest p-5 text-sm text-slate-600">
                        Dites-moi vos symptômes puis cliquez sur "Analyser mes symptômes" pour voir la recommandation de spécialiste.
                    </div>
                </div>
            </div>
        </section>
        <section class="px-2">
            <div class="p-5 rounded-2xl bg-surface-container border border-outline-variant flex gap-4 items-start">
                <span class="material-symbols-outlined text-primary mt-0.5">info</span>
                <p class="font-label-sm text-label-sm text-on-surface-variant leading-relaxed">
                    This AI assessment is for informational purposes only and does not replace professional medical advice. If you experience severe symptoms, contact emergency services immediately.
                </p>
            </div>
        </section>
    </div>
</main>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const symptomInput = document.getElementById('symptom-search');
        const selectedContainer = document.getElementById('selected-symptoms');
        const analyzeButton = document.getElementById('analyze-button');
        const resultPanel = document.getElementById('analysis-result');
        const chatMessages = document.getElementById('chat-messages');

        const symptomMapping = {
            headache: {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut évaluer les maux de tête, la fièvre et la fatigue pour orienter vers le bon spécialiste.'
            },
            fever: {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut vérifier les infections et orienter vers le bon spécialiste.'
            },
            fatigue: {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut évaluer la fatigue et proposer un bilan adapté.'
            },
            'mal de tête': {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut examiner les maux de tête fréquents et recommander la suite des soins.'
            },
            'fièvre': {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut rechercher une cause infectieuse ou inflammatoire et orienter le suivi.'
            },
            'fatigue': {
                doctor: 'Médecin généraliste',
                advice: 'Un médecin généraliste peut analyser la fatigue et proposer des examens adaptés.'
            },
            cough: {
                doctor: 'Pneumologue',
                advice: 'Un pneumologue peut évaluer la toux persistante et les difficultés respiratoires.'
            },
            'toux persistante': {
                doctor: 'Pneumologue',
                advice: 'Un pneumologue est spécialisé dans les troubles respiratoires et les infections pulmonaires.'
            },
            'difficulté à respirer': {
                doctor: 'Pneumologue',
                advice: 'Un pneumologue peut évaluer les difficultés respiratoires et proposer un traitement adapté.'
            },
            nausea: {
                doctor: 'Gastro-entérologue',
                advice: 'Un gastro-entérologue peut déterminer l’origine des douleurs d’estomac, de la diarrhée ou de la constipation.'
            },
            'douleur d estomac': {
                doctor: 'Gastro-entérologue',
                advice: 'Un gastro-entérologue peut examiner les troubles digestifs et proposer un traitement approprié.'
            },
            'douleur d\'estomac': {
                doctor: 'Gastro-entérologue',
                advice: 'Un gastro-entérologue peut examiner les troubles digestifs et proposer un traitement approprié.'
            },
            diarrhea: {
                doctor: 'Gastro-entérologue',
                advice: 'Un gastro-entérologue peut aider à identifier la cause des troubles intestinaux.'
            },
            constipation: {
                doctor: 'Gastro-entérologue',
                advice: 'Un gastro-entérologue peut traiter la constipation et en rechercher la cause.'
            },
            'chest pain': {
                doctor: 'Cardiologue',
                advice: 'Un cardiologue doit évaluer les douleurs thoraciques et les palpitations.'
            },
            palpitations: {
                doctor: 'Cardiologue',
                advice: 'Un cardiologue peut diagnostiquer les troubles du rythme et les douleurs thoraciques.'
            },
            dizziness: {
                doctor: 'Neurologue',
                advice: 'Un neurologue peut examiner les vertiges et les maux de tête fréquents.'
            },
            vertiges: {
                doctor: 'Neurologue',
                advice: 'Un neurologue peut aider à identifier les causes des vertiges et des maux de tête.'
            },
            'joint pain': {
                doctor: 'Rhumatologue',
                advice: 'Un rhumatologue peut diagnostiquer les douleurs articulaires et les rhumatismes.'
            },
            'douleurs articulaires': {
                doctor: 'Rhumatologue',
                advice: 'Un rhumatologue traite les douleurs articulaires et les affections musculo-squelettiques.'
            },
            rheumatism: {
                doctor: 'Rhumatologue',
                advice: 'Un rhumatologue peut évaluer les symptômes de rhumatisme et orienter le traitement.'
            },
            rash: {
                doctor: 'Dermatologue',
                advice: 'Un dermatologue peut diagnostiquer les éruptions cutanées et les démangeaisons.'
            },
            'éruption cutanée': {
                doctor: 'Dermatologue',
                advice: 'Un dermatologue est le spécialiste des affections de la peau et des démangeaisons.'
            },
            'démangeaisons': {
                doctor: 'Dermatologue',
                advice: 'Un dermatologue peut examiner les démangeaisons et recommander un traitement adapté.'
            },
            vision: {
                doctor: 'Ophtalmologue',
                advice: 'Un ophtalmologue peut évaluer les problèmes de vision et prescrire des soins visuels.'
            },
            'problèmes de vision': {
                doctor: 'Ophtalmologue',
                advice: 'Un ophtalmologue est le bon spécialiste pour les troubles visuels.'
            },
            'ear pain': {
                doctor: 'ORL',
                advice: 'Un médecin ORL peut examiner les douleurs ou pertes d’audition.'
            },
            'hearing loss': {
                doctor: 'ORL',
                advice: 'Un médecin ORL peut diagnostiquer les pertes d’audition et les troubles de l’oreille.'
            },
            'douleur ou perte d audition': {
                doctor: 'ORL',
                advice: 'Un médecin ORL peut évaluer les problèmes d’audition et de douleur auriculaire.'
            },
            toothache: {
                doctor: 'Dentiste',
                advice: 'Un dentiste peut évaluer la douleur dentaire et proposer le soin adapté.'
            },
            'douleur dentaire': {
                doctor: 'Dentiste',
                advice: 'Un dentiste est le spécialiste des douleurs et infections dentaires.'
            },
            anxiety: {
                doctor: 'Psychologue / Psychiatre',
                advice: 'Un psychologue ou un psychiatre peut aider pour l’anxiété, le stress ou la dépression.'
            },
            stress: {
                doctor: 'Psychologue / Psychiatre',
                advice: 'Un psychologue ou un psychiatre peut proposer un accompagnement pour le stress.'
            },
            depression: {
                doctor: 'Psychologue / Psychiatre',
                advice: 'Un psychologue ou un psychiatre peut aider pour les symptômes dépressifs.'
            },
            'anxiété': {
                doctor: 'Psychologue / Psychiatre',
                advice: 'Un psychologue ou un psychiatre peut aider à gérer l’anxiété.'
            },
            'douleurs musculaires': {
                doctor: 'Orthopédiste',
                advice: 'Un orthopédiste peut diagnostiquer les douleurs musculaires et les fractures.'
            },
            fractures: {
                doctor: 'Orthopédiste',
                advice: 'Un orthopédiste est le bon spécialiste en cas de fractures ou de douleurs musculo-squelettiques.'
            },
            'difficultés urinaires': {
                doctor: 'Urologue',
                advice: 'Un urologue peut évaluer les troubles urinaires et proposer un traitement approprié.'
            },
            diabetes: {
                doctor: 'Endocrinologue',
                advice: 'Un endocrinologue peut traiter les troubles hormonaux et le diabète.'
            },
            'troubles hormonaux': {
                doctor: 'Endocrinologue',
                advice: 'Un endocrinologue est le spécialiste des désordres hormonaux et métaboliques.'
            },
            'grossesse': {
                doctor: 'Gynécologue',
                advice: 'Un gynécologue peut accompagner la grossesse et les troubles gynécologiques.'
            },
            'troubles gynécologiques': {
                doctor: 'Gynécologue',
                advice: 'Un gynécologue peut examiner les troubles gynécologiques et fournir un suivi approprié.'
            },
            allergies: {
                doctor: 'Allergologue',
                advice: 'Un allergologue peut identifier et traiter les réactions allergiques.'
            },
            'réactions allergiques': {
                doctor: 'Allergologue',
                advice: 'Un allergologue est le spécialiste des allergies et des réactions allergiques.'
            },
            'back pain': {
                doctor: 'Orthopédiste',
                advice: 'Un orthopédiste peut examiner votre dos et proposer un traitement adapté.'
            }
        };

        const selectedSymptoms = new Set();
        const scrollHint = document.getElementById('scroll-hint');

        function normalize(symptom) {
            return symptom.trim().toLowerCase();
        }

        function addSymptom(symptom) {
            const normalized = normalize(symptom);
            if (!normalized) return;
            selectedSymptoms.add(normalized);
            renderSelected();
        }

        function showScrollHint() {
            if (!scrollHint) return;
            scrollHint.classList.remove('hidden');
            scrollHint.classList.add('flex');
            setTimeout(() => {
                scrollHint.classList.add('hidden');
                scrollHint.classList.remove('flex');
            }, 3500);
        }

        function removeSymptom(symptom) {
            selectedSymptoms.delete(normalize(symptom));
            renderSelected();
        }

        function renderSelected() {
            selectedContainer.innerHTML = '';
            if (selectedSymptoms.size === 0) {
                selectedContainer.innerHTML = '<span class="text-sm text-slate-500">Sélectionnez un ou plusieurs symptômes ci-dessus ou tapez votre symptôme puis appuyez sur Entrée.</span>';
                return;
            }
            selectedSymptoms.forEach(symptom => {
                const chip = document.createElement('button');
                chip.type = 'button';
                chip.className = 'inline-flex items-center gap-2 rounded-full border border-slate-200 bg-slate-100 px-3 py-2 text-sm text-slate-700';
                chip.innerHTML = `<span>${symptom.replace(/\b\w/g, c => c.toUpperCase())}</span><span class="material-symbols-outlined text-[18px]">close</span>`;
                chip.addEventListener('click', () => removeSymptom(symptom));
                selectedContainer.appendChild(chip);
            });
        }

        function findSuggestion(symptomList) {
            for (const symptom of symptomList) {
                const normalized = normalize(symptom);
                if (symptomMapping[normalized]) {
                    return symptomMapping[normalized];
                }
                for (const key of Object.keys(symptomMapping)) {
                    if (normalized.includes(key)) {
                        return symptomMapping[key];
                    }
                }
            }
            return {
                doctor: 'General Practitioner',
                advice: 'A general doctor is a good first step to assess your symptoms and guide next care options.'
            };
        }

        function showResult(symptoms) {
            const suggestion = findSuggestion(symptoms);
            const names = symptoms.map(symptom => symptom.replace(/\b\w/g, c => c.toUpperCase()));
            chatMessages.innerHTML = `
                <div class="flex justify-end">
                    <div class="max-w-[80%] rounded-3xl rounded-br-[1rem] bg-primary/10 border border-primary/20 p-4 text-sm text-slate-950 shadow-sm">
                        <p class="font-medium text-slate-900 mb-2">Vous</p>
                        <p>${names.join(', ')}</p>
                    </div>
                </div>
                <div class="flex justify-start">
                    <div class="max-w-[80%] rounded-3xl rounded-bl-[1rem] bg-surface-container-lowest border border-slate-200 p-4 text-sm text-slate-700 shadow-sm">
                        <p class="font-medium text-slate-900 mb-2">Smart santé AI</p>
                        <p class="mb-3">Nous recommandons de consulter :</p>
                        <p class="text-lg font-bold text-primary mb-2">${suggestion.doctor}</p>
                        <p>${suggestion.advice}</p>
                    </div>
                </div>
            `;
            resultPanel.classList.remove('hidden');
            resultPanel.scrollIntoView({ behavior: 'smooth', block: 'start' });
            showScrollHint();
        }

        function handleAnalyze() {
            const textValue = symptomInput?.value?.trim();
            if (textValue) {
                addSymptom(textValue);
                symptomInput.value = '';
            }
            if (selectedSymptoms.size === 0) {
                chatMessages.innerHTML = `
                    <div class="rounded-3xl bg-surface-container-lowest p-5 text-sm text-slate-600">
                        Veuillez saisir ou sélectionner au moins un symptôme pour obtenir une recommandation.
                    </div>
                `;
                resultPanel.classList.remove('hidden');
                return;
            }
            showResult(Array.from(selectedSymptoms));
        }

        document.querySelectorAll('[data-symptom]').forEach(button => {
            button.addEventListener('click', () => {
                addSymptom(button.getAttribute('data-symptom'));
            });
        });

        if (symptomInput) {
            symptomInput.addEventListener('keydown', function (event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    const value = symptomInput.value.trim();
                    if (value) {
                        addSymptom(value);
                        symptomInput.value = '';
                    }
                }
            });
        }

        if (analyzeButton) {
            analyzeButton.addEventListener('click', handleAnalyze);
        }

        renderSelected();
    });
</script>
@endsection