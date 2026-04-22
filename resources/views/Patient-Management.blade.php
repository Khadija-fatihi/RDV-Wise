<!DOCTYPE html><html class="light" lang="en"><head>
<meta charset="utf-8">
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<title>Patient Management | MedDash</title>
<script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet">
<script id="tailwind-config">
        tailwind.config = {
            darkMode: "class",
            theme: {
                extend: {
                    "colors": {
                        "surface-bright": "#f7f9fb",
                        "secondary-fixed-dim": "#6bd8cb",
                        "inverse-surface": "#2d3133",
                        "on-primary-container": "#eeefff",
                        "primary": "#004ac6",
                        "on-secondary-fixed-variant": "#005049",
                        "surface": "#f7f9fb",
                        "error": "#ba1a1a",
                        "tertiary": "#005a82",
                        "on-surface": "#191c1e",
                        "secondary": "#006a61",
                        "primary-fixed-dim": "#b4c5ff",
                        "surface-container-low": "#f2f4f6",
                        "surface-container-high": "#e6e8ea",
                        "on-secondary-fixed": "#00201d",
                        "inverse-on-surface": "#eff1f3",
                        "background": "#f7f9fb",
                        "error-container": "#ffdad6",
                        "on-error-container": "#93000a",
                        "surface-container-lowest": "#ffffff",
                        "on-tertiary-fixed-variant": "#004c6e",
                        "tertiary-container": "#0074a6",
                        "tertiary-fixed": "#c9e6ff",
                        "surface-container-highest": "#e0e3e5",
                        "on-error": "#ffffff",
                        "on-background": "#191c1e",
                        "on-primary-fixed-variant": "#003ea8",
                        "outline-variant": "#c3c6d7",
                        "surface-variant": "#e0e3e5",
                        "on-secondary-container": "#006f66",
                        "on-secondary": "#ffffff",
                        "inverse-primary": "#b4c5ff",
                        "primary-fixed": "#dbe1ff",
                        "surface-dim": "#d8dadc",
                        "primary-container": "#2563eb",
                        "surface-tint": "#0053db",
                        "on-tertiary-fixed": "#001e2f",
                        "outline": "#737686",
                        "on-surface-variant": "#434655",
                        "surface-container": "#eceef0",
                        "on-tertiary": "#ffffff",
                        "secondary-container": "#86f2e4",
                        "tertiary-fixed-dim": "#89ceff",
                        "on-tertiary-container": "#e4f2ff",
                        "on-primary-fixed": "#00174b",
                        "on-primary": "#ffffff",
                        "secondary-fixed": "#89f5e7"
                    },
                    "borderRadius": {
                        "DEFAULT": "0.5rem",
                        "lg": "0.75rem",
                        "xl": "1rem",
                        "full": "9999px"
                    },
                    "fontFamily": {
                        "headline": ["Manrope"],
                        "body": ["Inter"],
                        "label": ["Inter"]
                    }
                },
            },
        }
    </script>
<style>
        body { font-family: 'Inter', sans-serif; background-color: #f7f9fb; }
        .font-manrope { font-family: 'Manrope', sans-serif; }
        .material-symbols-outlined { font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24; }
    </style>
<style>*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.17 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}[type='text'],input:where(:not([type])),[type='email'],[type='url'],[type='password'],[type='number'],[type='date'],[type='datetime-local'],[type='month'],[type='search'],[type='tel'],[type='time'],[type='week'],[multiple],textarea,select{-webkit-appearance:none;appearance:none;background-color:#fff;border-color:#6b7280;border-width:1px;border-radius:0px;padding-top:0.5rem;padding-right:0.75rem;padding-bottom:0.5rem;padding-left:0.75rem;font-size:1rem;line-height:1.5rem;--tw-shadow:0 0 #0000;}[type='text']:focus, input:where(:not([type])):focus, [type='email']:focus, [type='url']:focus, [type='password']:focus, [type='number']:focus, [type='date']:focus, [type='datetime-local']:focus, [type='month']:focus, [type='search']:focus, [type='tel']:focus, [type='time']:focus, [type='week']:focus, [multiple]:focus, textarea:focus, select:focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset:var(--tw-empty,/*!*/ /*!*/);--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow);border-color:#2563eb}input::placeholder,textarea::placeholder{color:#6b7280;opacity:1}::-webkit-datetime-edit-fields-wrapper{padding:0}::-webkit-date-and-time-value{min-height:1.5em;text-align:inherit}::-webkit-datetime-edit{display:inline-flex}::-webkit-datetime-edit,::-webkit-datetime-edit-year-field,::-webkit-datetime-edit-month-field,::-webkit-datetime-edit-day-field,::-webkit-datetime-edit-hour-field,::-webkit-datetime-edit-minute-field,::-webkit-datetime-edit-second-field,::-webkit-datetime-edit-millisecond-field,::-webkit-datetime-edit-meridiem-field{padding-top:0;padding-bottom:0}select{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='M6 8l4 4 4-4'/%3e%3c/svg%3e");background-position:right 0.5rem center;background-repeat:no-repeat;background-size:1.5em 1.5em;padding-right:2.5rem;print-color-adjust:exact}[multiple],[size]:where(select:not([size="1"])){background-image:initial;background-position:initial;background-repeat:unset;background-size:initial;padding-right:0.75rem;print-color-adjust:unset}[type='checkbox'],[type='radio']{-webkit-appearance:none;appearance:none;padding:0;print-color-adjust:exact;display:inline-block;vertical-align:middle;background-origin:border-box;-webkit-user-select:none;user-select:none;flex-shrink:0;height:1rem;width:1rem;color:#2563eb;background-color:#fff;border-color:#6b7280;border-width:1px;--tw-shadow:0 0 #0000}[type='checkbox']{border-radius:0px}[type='radio']{border-radius:100%}[type='checkbox']:focus,[type='radio']:focus{outline:2px solid transparent;outline-offset:2px;--tw-ring-inset:var(--tw-empty,/*!*/ /*!*/);--tw-ring-offset-width:2px;--tw-ring-offset-color:#fff;--tw-ring-color:#2563eb;--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow)}[type='checkbox']:checked,[type='radio']:checked{border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat}[type='checkbox']:checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M12.207 4.793a1 1 0 010 1.414l-5 5a1 1 0 01-1.414 0l-2-2a1 1 0 011.414-1.414L6.5 9.086l4.293-4.293a1 1 0 011.414 0z'/%3e%3c/svg%3e");}@media (forced-colors: active) {[type='checkbox']:checked{-webkit-appearance:auto;appearance:auto}}[type='radio']:checked{background-image:url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");}@media (forced-colors: active) {[type='radio']:checked{-webkit-appearance:auto;appearance:auto}}[type='checkbox']:checked:hover,[type='checkbox']:checked:focus,[type='radio']:checked:hover,[type='radio']:checked:focus{border-color:transparent;background-color:currentColor}[type='checkbox']:indeterminate{background-image:url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 16 16'%3e%3cpath stroke='white' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M4 8h8'/%3e%3c/svg%3e");border-color:transparent;background-color:currentColor;background-size:100% 100%;background-position:center;background-repeat:no-repeat;}@media (forced-colors: active) {[type='checkbox']:indeterminate{-webkit-appearance:auto;appearance:auto}}[type='checkbox']:indeterminate:hover,[type='checkbox']:indeterminate:focus{border-color:transparent;background-color:currentColor}[type='file']{background:unset;border-color:inherit;border-width:0;border-radius:0;padding:0;font-size:unset;line-height:inherit}[type='file']:focus{outline:1px solid ButtonText;outline:1px auto -webkit-focus-ring-color}.absolute{position:absolute}.relative{position:relative}.sticky{position:sticky}.-bottom-2{bottom:-0.5rem}.-right-2{right:-0.5rem}.left-3{left:0.75rem}.right-1\.5{right:0.375rem}.top-0{top:0px}.top-1\.5{top:0.375rem}.top-1\/2{top:50%}.z-10{z-index:10}.z-50{z-index:50}.mb-1{margin-bottom:0.25rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.ml-auto{margin-left:auto}.mr-1{margin-right:0.25rem}.mr-2{margin-right:0.5rem}.mt-1{margin-top:0.25rem}.mt-2{margin-top:0.5rem}.mt-3{margin-top:0.75rem}.mt-4{margin-top:1rem}.flex{display:flex}.inline-flex{display:inline-flex}.grid{display:grid}.hidden{display:none}.h-10{height:2.5rem}.h-12{height:3rem}.h-16{height:4rem}.h-2{height:0.5rem}.h-6{height:1.5rem}.h-8{height:2rem}.h-\[1024px\]{height:1024px}.h-full{height:100%}.min-h-\[1024px\]{min-height:1024px}.w-10{width:2.5rem}.w-12{width:3rem}.w-2{width:0.5rem}.w-64{width:16rem}.w-8{width:2rem}.w-full{width:100%}.w-px{width:1px}.max-w-xl{max-width:36rem}.flex-1{flex:1 1 0%}.border-collapse{border-collapse:collapse}.-translate-y-1\/2{--tw-translate-y:-50%;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.rotate-12{--tw-rotate:12deg;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.scale-150{--tw-scale-x:1.5;--tw-scale-y:1.5;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.cursor-pointer{cursor:pointer}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-center{align-items:center}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.gap-1{gap:0.25rem}.gap-2{gap:0.5rem}.gap-3{gap:0.75rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.space-x-3 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(0.75rem * var(--tw-space-x-reverse));margin-left:calc(0.75rem * calc(1 - var(--tw-space-x-reverse)))}.space-x-4 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1rem * var(--tw-space-x-reverse));margin-left:calc(1rem * calc(1 - var(--tw-space-x-reverse)))}.space-y-1 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.25rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.25rem * var(--tw-space-y-reverse))}.space-y-2 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(0.5rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(0.5rem * var(--tw-space-y-reverse))}.space-y-8 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(2rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(2rem * var(--tw-space-y-reverse))}.divide-y > :not([hidden]) ~ :not([hidden]){--tw-divide-y-reverse:0;border-top-width:calc(1px * calc(1 - var(--tw-divide-y-reverse)));border-bottom-width:calc(1px * var(--tw-divide-y-reverse))}.divide-slate-100 > :not([hidden]) ~ :not([hidden]){--tw-divide-opacity:1;border-color:rgb(241 245 249 / var(--tw-divide-opacity, 1))}.overflow-hidden{overflow:hidden}.overflow-x-auto{overflow-x:auto}.rounded{border-radius:0.5rem}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.75rem}.rounded-xl{border-radius:1rem}.border{border-width:1px}.border-2{border-width:2px}.border-b{border-bottom-width:1px}.border-r{border-right-width:1px}.border-t{border-top-width:1px}.border-none{border-style:none}.border-amber-100{--tw-border-opacity:1;border-color:rgb(254 243 199 / var(--tw-border-opacity, 1))}.border-blue-100{--tw-border-opacity:1;border-color:rgb(219 234 254 / var(--tw-border-opacity, 1))}.border-emerald-100{--tw-border-opacity:1;border-color:rgb(209 250 229 / var(--tw-border-opacity, 1))}.border-slate-100{--tw-border-opacity:1;border-color:rgb(241 245 249 / var(--tw-border-opacity, 1))}.border-slate-200{--tw-border-opacity:1;border-color:rgb(226 232 240 / var(--tw-border-opacity, 1))}.border-slate-200\/60{border-color:rgb(226 232 240 / 0.6)}.border-white{--tw-border-opacity:1;border-color:rgb(255 255 255 / var(--tw-border-opacity, 1))}.bg-amber-50{--tw-bg-opacity:1;background-color:rgb(255 251 235 / var(--tw-bg-opacity, 1))}.bg-blue-50{--tw-bg-opacity:1;background-color:rgb(239 246 255 / var(--tw-bg-opacity, 1))}.bg-blue-600{--tw-bg-opacity:1;background-color:rgb(37 99 235 / var(--tw-bg-opacity, 1))}.bg-emerald-50{--tw-bg-opacity:1;background-color:rgb(236 253 245 / var(--tw-bg-opacity, 1))}.bg-emerald-500{--tw-bg-opacity:1;background-color:rgb(16 185 129 / var(--tw-bg-opacity, 1))}.bg-orange-50{--tw-bg-opacity:1;background-color:rgb(255 247 237 / var(--tw-bg-opacity, 1))}.bg-red-500{--tw-bg-opacity:1;background-color:rgb(239 68 68 / var(--tw-bg-opacity, 1))}.bg-slate-100{--tw-bg-opacity:1;background-color:rgb(241 245 249 / var(--tw-bg-opacity, 1))}.bg-slate-200{--tw-bg-opacity:1;background-color:rgb(226 232 240 / var(--tw-bg-opacity, 1))}.bg-slate-50{--tw-bg-opacity:1;background-color:rgb(248 250 252 / var(--tw-bg-opacity, 1))}.bg-slate-50\/30{background-color:rgb(248 250 252 / 0.3)}.bg-slate-50\/50{background-color:rgb(248 250 252 / 0.5)}.bg-slate-50\/80{background-color:rgb(248 250 252 / 0.8)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity, 1))}.object-cover{object-fit:cover}.p-2{padding:0.5rem}.p-4{padding:1rem}.p-6{padding:1.5rem}.px-2{padding-left:0.5rem;padding-right:0.5rem}.px-2\.5{padding-left:0.625rem;padding-right:0.625rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-0\.5{padding-top:0.125rem;padding-bottom:0.125rem}.py-1{padding-top:0.25rem;padding-bottom:0.25rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.py-2\.5{padding-top:0.625rem;padding-bottom:0.625rem}.py-4{padding-top:1rem;padding-bottom:1rem}.pl-10{padding-left:2.5rem}.pr-4{padding-right:1rem}.text-left{text-align:left}.text-right{text-align:right}.font-body{font-family:Inter}.font-mono{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-7xl{font-size:4.5rem;line-height:1}.text-base{font-size:1rem;line-height:1.5rem}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:0.75rem;line-height:1rem}.font-bold{font-weight:700}.font-extrabold{font-weight:800}.font-medium{font-weight:500}.font-semibold{font-weight:600}.uppercase{text-transform:uppercase}.italic{font-style:italic}.tracking-tight{letter-spacing:-0.025em}.tracking-wider{letter-spacing:0.05em}.text-amber-700{--tw-text-opacity:1;color:rgb(180 83 9 / var(--tw-text-opacity, 1))}.text-blue-100{--tw-text-opacity:1;color:rgb(219 234 254 / var(--tw-text-opacity, 1))}.text-blue-200{--tw-text-opacity:1;color:rgb(191 219 254 / var(--tw-text-opacity, 1))}.text-blue-600{--tw-text-opacity:1;color:rgb(37 99 235 / var(--tw-text-opacity, 1))}.text-blue-700{--tw-text-opacity:1;color:rgb(29 78 216 / var(--tw-text-opacity, 1))}.text-emerald-600{--tw-text-opacity:1;color:rgb(5 150 105 / var(--tw-text-opacity, 1))}.text-emerald-700{--tw-text-opacity:1;color:rgb(4 120 87 / var(--tw-text-opacity, 1))}.text-orange-600{--tw-text-opacity:1;color:rgb(234 88 12 / var(--tw-text-opacity, 1))}.text-slate-400{--tw-text-opacity:1;color:rgb(148 163 184 / var(--tw-text-opacity, 1))}.text-slate-500{--tw-text-opacity:1;color:rgb(100 116 139 / var(--tw-text-opacity, 1))}.text-slate-600{--tw-text-opacity:1;color:rgb(71 85 105 / var(--tw-text-opacity, 1))}.text-slate-700{--tw-text-opacity:1;color:rgb(51 65 85 / var(--tw-text-opacity, 1))}.text-slate-900{--tw-text-opacity:1;color:rgb(15 23 42 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.text-white\/10{color:rgb(255 255 255 / 0.1)}.opacity-0{opacity:0}.shadow-sm{--tw-shadow:0 1px 2px 0 rgb(0 0 0 / 0.05);--tw-shadow-colored:0 1px 2px 0 var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.outline-none{outline:2px solid transparent;outline-offset:2px}.ring-2{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-blue-50{--tw-ring-opacity:1;--tw-ring-color:rgb(239 246 255 / var(--tw-ring-opacity, 1))}.backdrop-blur-md{--tw-backdrop-blur:blur(12px);-webkit-backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia);backdrop-filter:var(--tw-backdrop-blur) var(--tw-backdrop-brightness) var(--tw-backdrop-contrast) var(--tw-backdrop-grayscale) var(--tw-backdrop-hue-rotate) var(--tw-backdrop-invert) var(--tw-backdrop-opacity) var(--tw-backdrop-saturate) var(--tw-backdrop-sepia)}.transition-all{transition-property:all;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-opacity{transition-property:opacity;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-200{transition-duration:200ms}.ease-in-out{transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1)}.hover\:bg-blue-50:hover{--tw-bg-opacity:1;background-color:rgb(239 246 255 / var(--tw-bg-opacity, 1))}.hover\:bg-blue-700:hover{--tw-bg-opacity:1;background-color:rgb(29 78 216 / var(--tw-bg-opacity, 1))}.hover\:bg-slate-100:hover{--tw-bg-opacity:1;background-color:rgb(241 245 249 / var(--tw-bg-opacity, 1))}.hover\:bg-slate-50:hover{--tw-bg-opacity:1;background-color:rgb(248 250 252 / var(--tw-bg-opacity, 1))}.hover\:bg-slate-50\/50:hover{background-color:rgb(248 250 252 / 0.5)}.hover\:text-blue-600:hover{--tw-text-opacity:1;color:rgb(37 99 235 / var(--tw-text-opacity, 1))}.hover\:underline:hover{-webkit-text-decoration-line:underline;text-decoration-line:underline}.focus\:border-transparent:focus{border-color:transparent}.focus\:ring-2:focus{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(2px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus\:ring-blue-500:focus{--tw-ring-opacity:1;--tw-ring-color:rgb(59 130 246 / var(--tw-ring-opacity, 1))}.active\:scale-95:active{--tw-scale-x:.95;--tw-scale-y:.95;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.active\:opacity-80:active{opacity:0.8}.disabled\:opacity-50:disabled{opacity:0.5}.group:hover .group-hover\:opacity-100{opacity:1}.dark\:divide-slate-800:is(.dark *) > :not([hidden]) ~ :not([hidden]){--tw-divide-opacity:1;border-color:rgb(30 41 59 / var(--tw-divide-opacity, 1))}.dark\:border-blue-800:is(.dark *){--tw-border-opacity:1;border-color:rgb(30 64 175 / var(--tw-border-opacity, 1))}.dark\:border-slate-700:is(.dark *){--tw-border-opacity:1;border-color:rgb(51 65 85 / var(--tw-border-opacity, 1))}.dark\:border-slate-800:is(.dark *){--tw-border-opacity:1;border-color:rgb(30 41 59 / var(--tw-border-opacity, 1))}.dark\:border-slate-950:is(.dark *){--tw-border-opacity:1;border-color:rgb(2 6 23 / var(--tw-border-opacity, 1))}.dark\:bg-blue-900\/30:is(.dark *){background-color:rgb(30 58 138 / 0.3)}.dark\:bg-slate-800:is(.dark *){--tw-bg-opacity:1;background-color:rgb(30 41 59 / var(--tw-bg-opacity, 1))}.dark\:bg-slate-800\/50:is(.dark *){background-color:rgb(30 41 59 / 0.5)}.dark\:bg-slate-900:is(.dark *){--tw-bg-opacity:1;background-color:rgb(15 23 42 / var(--tw-bg-opacity, 1))}.dark\:bg-slate-950\/80:is(.dark *){background-color:rgb(2 6 23 / 0.8)}.dark\:text-blue-300:is(.dark *){--tw-text-opacity:1;color:rgb(147 197 253 / var(--tw-text-opacity, 1))}.dark\:text-blue-400:is(.dark *){--tw-text-opacity:1;color:rgb(96 165 250 / var(--tw-text-opacity, 1))}.dark\:text-slate-300:is(.dark *){--tw-text-opacity:1;color:rgb(203 213 225 / var(--tw-text-opacity, 1))}.dark\:text-slate-400:is(.dark *){--tw-text-opacity:1;color:rgb(148 163 184 / var(--tw-text-opacity, 1))}.dark\:text-white:is(.dark *){--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.dark\:shadow-none:is(.dark *){--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.dark\:hover\:bg-slate-800:hover:is(.dark *){--tw-bg-opacity:1;background-color:rgb(30 41 59 / var(--tw-bg-opacity, 1))}.dark\:hover\:bg-slate-800\/30:hover:is(.dark *){background-color:rgb(30 41 59 / 0.3)}@media (min-width: 768px){.md\:block{display:block}.md\:flex{display:flex}.md\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.md\:flex-row{flex-direction:row}.md\:items-center{align-items:center}}@media (min-width: 1024px){.lg\:p-8{padding:2rem}}</style></head>
<body class="flex min-h-[1024px]" data-stitch-vh="min-h-[1024px]===min-h-screen" data-mode="connect">
<!-- SideNavBar (Shared Component) -->
<aside class="hidden md:flex flex-col p-4 space-y-2 bg-white dark:bg-slate-900 h-[1024px] w-64 border-r border-slate-200 dark:border-slate-800 shadow-sm dark:shadow-none sticky top-0" data-stitch-vh="h-[1024px]===h-screen">
<div class="px-2 py-4 mb-4">
<span class="text-xl font-extrabold text-blue-600 dark:text-blue-400 font-manrope">RDV Wise</span>
</div>
<div class="flex items-center space-x-3 px-3 py-4 mb-6 border-b border-slate-100 dark:border-slate-800">
<img alt="Doctor Portrait" class="w-10 h-10 rounded-full object-cover ring-2 ring-blue-50" data-alt="professional portrait of a male doctor wearing a white lab coat warm smile modern clinic background soft lighting" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBRL2A8T9Z52MIZgfqq1pi4ycK_-7HEliy-JuVaEqA3WRawbPwkQThrp8R6mjAOfSL8ZrcqV0wKxFIKu8dNxorduTsa8qABRydt3fa_WgNQpeTe7vG8v6TPrXG78A9NX9-gmr24DnXa-f5TY2GAg_x5OXXEvqXpAEM5otdyuZmorO2Z9ioZwS7iCyLZooStAC4sIG_MlKJp7Y5eUHyTpm2lp0-yDbxW3bC1ApWWk3H5jcmVGX48gVrvN7MCq3vRzfp2YXO8kPF9T-s">
<div>
<p class="text-sm font-bold text-slate-900 dark:text-white font-manrope">Dr. Smith</p>
<p class="text-xs text-slate-500">Cardiologist</p>
</div>
</div>
<nav class="space-y-1">
<a class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 ease-in-out rounded-lg font-manrope" href="#">
<span class="material-symbols-outlined" data-icon="calendar_today">calendar_today</span>
<span class="text-sm font-medium">Schedule</span>
</a>
<!-- Active Tab: Patients -->
<a class="flex items-center space-x-3 px-4 py-2.5 bg-blue-50 dark:bg-blue-900/30 text-blue-700 dark:text-blue-300 font-bold rounded-lg transition-all duration-200 ease-in-out font-manrope" href="#">
<span class="material-symbols-outlined" data-icon="group" style="font-variation-settings: 'FILL' 1;">group</span>
<span class="text-sm">Patients</span>
</a>
<a class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 ease-in-out rounded-lg font-manrope" href="#">
<span class="material-symbols-outlined" data-icon="medical_services">medical_services</span>
<span class="text-sm font-medium">Consults</span>
</a>
<a class="flex items-center space-x-3 px-4 py-2.5 text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 transition-all duration-200 ease-in-out rounded-lg font-manrope" href="#">
<span class="material-symbols-outlined" data-icon="account_circle">account_circle</span>
<span class="text-sm font-medium">Profile</span>
</a>
</nav>
</aside>
<!-- Main Content -->
<main class="flex-1 flex flex-col">
<!-- TopNavBar (Shared Component) -->
<header class="sticky top-0 z-50 flex justify-between items-center px-6 h-16 w-full bg-slate-50/80 dark:bg-slate-950/80 backdrop-blur-md border-b border-slate-200 dark:border-slate-800">
<div class="flex items-center flex-1 max-w-xl">
<div class="relative w-full">
<span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400 text-lg">search</span>
<input class="w-full bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-lg pl-10 pr-4 py-2 text-sm focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all outline-none font-manrope" placeholder="Search patients by name or CIN" type="text">
</div>
</div>
<div class="flex items-center space-x-4">
<button class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors rounded-full relative cursor-pointer active:opacity-80">
<span class="material-symbols-outlined" data-icon="notifications">notifications</span>
<span class="absolute top-1.5 right-1.5 w-2 h-2 bg-red-500 rounded-full border-2 border-white dark:border-slate-950"></span>
</button>
<button class="p-2 text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-800 transition-colors rounded-full cursor-pointer active:opacity-80">
<span class="material-symbols-outlined" data-icon="settings">settings</span>
</button>
</div>
</header>
<!-- Page Canvas -->
<div class="p-6 lg:p-8 space-y-8">
<!-- Header Section -->
<div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
<div>
<h1 class="text-3xl font-extrabold text-slate-900 dark:text-white font-manrope tracking-tight">Patient Directory</h1>
<p class="text-slate-500 font-body mt-1">Manage and monitor 1,284 total patient records</p>
</div>
<div class="flex items-center gap-3">
<button class="inline-flex items-center px-4 py-2.5 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-all shadow-sm active:scale-95 font-manrope text-sm">
<span class="material-symbols-outlined mr-2 text-lg">person_add</span>
                        Add New Patient
                    </button>
</div>
</div>
<!-- Filters Bar -->
<div class="bg-white dark:bg-slate-900 p-4 rounded-xl shadow-sm border border-slate-200/60 dark:border-slate-800 flex flex-wrap items-center gap-4">
<div class="flex items-center gap-2">
<span class="text-xs font-bold text-slate-400 uppercase tracking-wider font-manrope">Filter By:</span>
<select class="bg-slate-50 dark:bg-slate-800 border-none rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 cursor-pointer">
<option>Status: All</option>
<option>Active</option>
<option>Inactive</option>
<option>Pending</option>
</select>
</div>
<select class="bg-slate-50 dark:bg-slate-800 border-none rounded-lg text-sm font-medium text-slate-700 dark:text-slate-300 px-3 py-2 focus:ring-2 focus:ring-blue-500 cursor-pointer">
<option>Last Visit: Anytime</option>
<option>This Week</option>
<option>This Month</option>
<option>Last 3 Months</option>
<option>Over 6 Months</option>
</select>
<div class="h-6 w-px bg-slate-200 dark:bg-slate-800 hidden md:block"></div>
<button class="text-blue-600 dark:text-blue-400 text-sm font-semibold hover:underline">Clear all filters</button>
<div class="ml-auto flex items-center gap-2">
<button class="p-2 rounded-lg bg-slate-50 dark:bg-slate-800 text-slate-600 border border-slate-200 dark:border-slate-700">
<span class="material-symbols-outlined text-xl">grid_view</span>
</button>
<button class="p-2 rounded-lg bg-blue-50 dark:bg-blue-900/30 text-blue-600 border border-blue-100 dark:border-blue-800">
<span class="material-symbols-outlined text-xl">list</span>
</button>
</div>
</div>
<!-- Table Container -->
<div class="bg-white dark:bg-slate-900 rounded-xl shadow-sm border border-slate-200/60 dark:border-slate-800 overflow-hidden">
<div class="overflow-x-auto">
<table class="w-full text-left border-collapse">
<thead>
<tr class="bg-slate-50/50 dark:bg-slate-800/50 border-b border-slate-100 dark:border-slate-800">
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope">Name</th>
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope">Patient ID</th>
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope">Last Visit</th>
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope">Next Appointment</th>
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope">Status</th>
<th class="px-6 py-4 text-xs font-bold text-slate-500 uppercase tracking-wider font-manrope text-right">Actions</th>
</tr>
</thead>
<tbody class="divide-y divide-slate-100 dark:divide-slate-800">
<!-- Patient Row 1 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Patient" class="w-10 h-10 rounded-full object-cover" data-alt="headshot of an elderly woman with silver hair kind eyes soft daylight studio portrait" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAUMZK3smtZKI8EA83iNpR-rMbXtTvsjcFtbnCXWJbqukAFmJ8UaYdEmeHJiJeGLMxHQ5CZl2NzyV4O12JUPBl98kEcfMR6NWKEATVToHXER8uZSkqSaP0DPMm4hzljDxwn60qvkram3eB87FfNjK5Put--oR7ShhISKw8SDqfa-5IUhXFhwhYE5eHsTBtfRIw90Zk1BxKbnQzvCGenDOb2b-CNMOU6gcqQh6o4lzfYkiid6uul7fCBPuINGR88jP_sAtVJ5pjNfJg">
<div>
<p class="text-sm font-bold text-slate-900 dark:text-white font-manrope">Elena Rodriguez</p>
<p class="text-xs text-slate-500">elena.rod@email.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="text-sm font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">#PA-8921</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Oct 12, 2023</td>
<td class="px-6 py-4">
<div class="flex items-center text-sm text-blue-600 dark:text-blue-400 font-medium">
<span class="material-symbols-outlined text-base mr-1">event</span>
                                        Nov 24, 2023
                                    </div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        Active
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="View Record">
<span class="material-symbols-outlined text-xl">description</span>
</button>
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors" title="Schedule">
<span class="material-symbols-outlined text-xl">add_task</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 2 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Patient" class="w-10 h-10 rounded-full object-cover" data-alt="young man with glasses short hair smiling wearing a casual sweater bright office background warm tones" src="https://lh3.googleusercontent.com/aida-public/AB6AXuCYUFnH9zzsGq3TlPHpd8lpTwUyKB15oShz_zWiscZHCOixCJU_PUeK1-AvLKAfHkxnFm_aiDgIkNTiLfaGLn7jnypqHFeRV2rO9CnuPU1WWSGGrqtNuSqaghTzka245O2slNzObnt_xj5bYjoIB4q96ZSk3ss9hro3cwvjdp0M723MtcY8sFLfR1MfsjCTZ9Vw55Jr4vQ2-Aon0s_msZDLBa4G8_yyGXu-sQLgrFDdkGDzfu7lFCV8UW93496u0bVpkmp_owH8wo0">
<div>
<p class="text-sm font-bold text-slate-900 dark:text-white font-manrope">Marcus Chen</p>
<p class="text-xs text-slate-500">m.chen@outlook.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="text-sm font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">#PA-7702</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Sep 28, 2023</td>
<td class="px-6 py-4">
<span class="text-sm text-slate-400 italic">Not scheduled</span>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-amber-50 text-amber-700 border border-amber-100">
                                        Pending
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">description</span>
</button>
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">add_task</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 3 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Patient" class="w-10 h-10 rounded-full object-cover" data-alt="middle aged man with a beard thoughtful expression wearing a polo shirt outdoors blurry park background" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDQLoLwv6AhJ1xe4-H2ePtPq1CWDR7f0PdK1ve2dz3h8Rw1tY7yBw7GRxH7A7DNF3nCiiQ8DMcBZmi3lx7sAW6K2i-d7w7HXj6AY6psd_3P4V74hfgk-7Xre8QHT9zaCCC2LXQgNK73zMxwgmZZ4UTy1cfy6vIsYvobhlweAsrFvNPWQW3vRsh5J_pI0-zPQGsCHNger_CL1Q2nPunTLyfUDwBM9pGhlw85m0Ih7CQkvR-nI3f_isSGCoXKjS4yFOu7tuSzsOhzRkQ">
<div>
<p class="text-sm font-bold text-slate-900 dark:text-white font-manrope">Samuel Oak</p>
<p class="text-xs text-slate-500">oak.s@provider.net</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="text-sm font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">#PA-1129</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Aug 05, 2023</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Dec 01, 2023</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-slate-100 text-slate-600 border border-slate-200">
                                        Inactive
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">description</span>
</button>
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">add_task</span>
</button>
</div>
</td>
</tr>
<!-- Patient Row 4 -->
<tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors group">
<td class="px-6 py-4">
<div class="flex items-center gap-3">
<img alt="Patient" class="w-10 h-10 rounded-full object-cover" data-alt="stylish woman in her 30s professional attire modern indoor lighting sharp focus on face vibrant colors" src="https://lh3.googleusercontent.com/aida-public/AB6AXuC6h_Q5RMUiFIjcZQIvTPMcw3F0pntIsrfGXIX0nM2Hl4McaM_wh3ASg257TDEfBynOPmnFVFrCaIcXVE1XRUw48XPB3zU24QtA7SdBB7xaCYXbboeAV4Vke022o8zW3K5MX9ocSmjHOD46pUPLRRQkDNsXUx-FPcMf8eCo8Tfd_nkaYit_8we5usqJlpNLsjhSp4jDabFMh07aoc7KFQb6w0tHSlZaKdNzPTrDpv5FxJ4shrjABp8MK-Ea6ATB9NBPPqyjcJfJ-mo">
<div>
<p class="text-sm font-bold text-slate-900 dark:text-white font-manrope">Sarah Jenkins</p>
<p class="text-xs text-slate-500">s.jenkins@gmail.com</p>
</div>
</div>
</td>
<td class="px-6 py-4">
<span class="text-sm font-mono text-slate-600 dark:text-slate-400 bg-slate-100 dark:bg-slate-800 px-2 py-1 rounded">#PA-5541</span>
</td>
<td class="px-6 py-4 text-sm text-slate-600 dark:text-slate-400">Yesterday</td>
<td class="px-6 py-4">
<div class="flex items-center text-sm text-blue-600 dark:text-blue-400 font-medium">
<span class="material-symbols-outlined text-base mr-1">event</span>
                                        Dec 15, 2023
                                    </div>
</td>
<td class="px-6 py-4">
<span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        Active
                                    </span>
</td>
<td class="px-6 py-4 text-right">
<div class="flex items-center justify-end gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">description</span>
</button>
<button class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
<span class="material-symbols-outlined text-xl">add_task</span>
</button>
</div>
</td>
</tr>
</tbody>
</table>
</div>
<!-- Pagination -->
<div class="px-6 py-4 flex items-center justify-between border-t border-slate-100 dark:border-slate-800 bg-slate-50/30">
<p class="text-sm text-slate-500">Showing <span class="font-bold text-slate-900">1 to 10</span> of <span class="font-bold text-slate-900">1,284</span> results</p>
<div class="flex items-center gap-1">
<button class="p-2 rounded-lg text-slate-400 hover:bg-slate-100 disabled:opacity-50" disabled="">
<span class="material-symbols-outlined">chevron_left</span>
</button>
<button class="w-8 h-8 rounded-lg bg-blue-600 text-white text-sm font-bold">1</button>
<button class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 text-sm font-medium">2</button>
<button class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 text-sm font-medium">3</button>
<span class="px-2 text-slate-400">...</span>
<button class="w-8 h-8 rounded-lg text-slate-600 hover:bg-slate-100 text-sm font-medium">129</button>
<button class="p-2 rounded-lg text-slate-600 hover:bg-slate-100">
<span class="material-symbols-outlined">chevron_right</span>
</button>
</div>
</div>
</div>
<!-- Stats Overview Bento Grid Item -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
<div class="p-6 bg-blue-600 rounded-xl text-white flex justify-between items-center overflow-hidden relative">
<div class="relative z-10">
<p class="text-blue-100 text-sm font-medium mb-1">New Registrations</p>
<h3 class="text-3xl font-extrabold font-manrope">+24</h3>
<p class="text-blue-200 text-xs mt-2 flex items-center">
<span class="material-symbols-outlined text-xs mr-1">trending_up</span>
                            12% from last month
                        </p>
</div>
<span class="material-symbols-outlined text-7xl text-white/10 absolute -right-2 -bottom-2 scale-150 rotate-12">person_add</span>
</div>
<div class="p-6 bg-white dark:bg-slate-900 rounded-xl border border-slate-200/60 dark:border-slate-800 flex flex-col justify-between">
<div class="flex justify-between">
<p class="text-slate-500 text-sm font-medium font-manrope">Retention Rate</p>
<span class="text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded text-xs font-bold">94%</span>
</div>
<div class="mt-4">
<div class="h-2 w-full bg-slate-100 dark:bg-slate-800 rounded-full overflow-hidden">
<div class="h-full bg-emerald-500 rounded-full" style="width: 94%"></div>
</div>
</div>
<p class="text-xs text-slate-400 mt-3">High patient satisfaction recorded this quarter.</p>
</div>
<div class="p-6 bg-white dark:bg-slate-900 rounded-xl border border-slate-200/60 dark:border-slate-800 flex items-center gap-4">
<div class="w-12 h-12 rounded-lg bg-orange-50 text-orange-600 flex items-center justify-center">
<span class="material-symbols-outlined">feedback</span>
</div>
<div>
<p class="text-slate-900 dark:text-white font-bold font-manrope text-lg">8 Pending Reviews</p>
<p class="text-slate-500 text-sm">Action required for record verification</p>
</div>
</div>
</div>
</div>
</main>
</body></html>