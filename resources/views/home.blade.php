<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actra~Uctadiv - Track Every Activity</title>

    <!-- Google Fonts: Poppins -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Main Favicon (Modern Browsers) -->
    <link rel="icon" href="favicon.svg" type="image/svg+xml">

    <!-- Fallback for older browsers -->
    <link rel="alternate icon" href="/favicon.ico">

    <!-- Apple Touch Icon (for iPhones and iPads) -->
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">

    <!-- Web App Manifest (for Android and PWA functionality) -->
    <link rel="manifest" href="/site.webmanifest">

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="style.css">

    <!-- Custom JavaScript (defer ensures it runs after HTML is parsed) -->
    <script src="script.js" defer></script>

    <style>
        /* --- Global Setup & Variables --- */
        :root {
            --bg-dark: #f5f9ff;
            --bg-card: #ffffff;
            --bg-header: rgba(255, 255, 255, 0.9);

            --text-primary: #1e293b;
            --text-secondary: #64748b;

            --accent-blue: #2563eb;
            --accent-violet: #3b82f6;
            --accent-magenta: #60a5fa;

            --border-color: #e2e8f0;
            --border-radius: 12px;
        }

        /* --- Base & Utilities --- */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            font-family: "Poppins";
            background: linear-gradient(180deg, #f8fbff, #eef5ff);
            color: var(--text-primary);
        }

        body.menu-open {
            overflow: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding-inline: 20px;
        }

        section {
            padding-block: clamp(5rem, 10vw, 8rem);
        }

        .explore-link {
            color: var(--text-primary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            margin-top: auto;
        }

        .explore-link i {
            margin-left: 5px;
            transition: transform 0.3s ease;
        }

        .explore-link:hover {
            color: var(--accent-blue);
        }

        .explore-link:hover i {
            transform: translateX(5px);
        }

        /* --- Header & Navigation --- */
        .main-header {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            width: 95%;
            max-width: 1200px;
            z-index: 1000;
            /* OPTIMIZED: Specified transition properties */
            transition: background-color 0.3s ease, top 0.3s ease, width 0.3s ease,
                max-width 0.3s ease, border-radius 0.3s ease;
        }

        .main-header.scrolled {
            top: 0;
            width: 100%;
            max-width: 100%;
            border-radius: 0;
            background-color: var(--bg-card);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .main-header nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: var(--bg-header);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            padding: 1rem 2rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            /* OPTIMIZED: Specified transition properties */
            transition: background-color 0.3s ease, border-color 0.3s ease,
                backdrop-filter 0.3s ease, padding 0.3s ease;
        }

        .main-header.scrolled nav {
            background: transparent;
            border-color: transparent;
            backdrop-filter: none;
            padding: 1.2rem 2rem;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--text-primary);
            text-decoration: none;
        }

        .nav-menu {
            list-style: none;
            display: flex;
            align-items: center;
            gap: 2rem;
        }

        .nav-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            position: relative;
        }

        .nav-link.active-link,
        .nav-link:hover {
            color: var(--text-primary);
        }

        .nav-link.active-link::after {
            content: "";
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 100%;
            height: 2px;
            background-color: var(--accent-blue);
        }

        .contact-button {
            background-color: var(--accent-blue);
            padding: 0.5rem 1rem;
            border-radius: 50px;
            color: var(--text-primary);
            /* OPTIMIZED: Specified transition properties */
            transition: background-color 0.3s ease, color 0.3s ease, transform 0.3s ease;
        }

        .contact-button:hover {
            color: var(--text-primary);
            transform: scale(1.05);
        }

        /* --- Hero Section --- */
        /* ====================================================== */
        /* START: ULTIMATE ELEGANCE HERO SECTION CSS              */
        /* ====================================================== */

        #hero {
            min-height: 100vh;
            display: grid;
            /* Use grid for easy centering */
            place-items: center;
            position: relative;
            overflow: hidden;
        }

        /* Base Gradient & Pattern (Unchanged) */
        #hero::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            width: 150%;
            height: 150%;
            background: linear-gradient(135deg,
                    var(--accent-blue),
                    var(--accent-violet),
                    var(--accent-magenta));
            z-index: -3;
            transform: translate(-50%, -50%);
            filter: blur(120px);
            opacity: 0.6;
            animation: gradient-flow 15s ease-in-out infinite;
        }

        .hero-background-pattern {
            position: absolute;
            top: 0;
            left: 0;
            width: 200%;
            height: 200%;
            background-image: linear-gradient(rgba(255, 255, 255, 0.03) 1px,
                    transparent 1px),
                linear-gradient(90deg, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
            background-size: 50px 50px;
            z-index: -2;
            animation: pan-grid 60s linear infinite;
        }

        @keyframes pan-grid {
            from {
                transform: translate(0, 0);
            }

            to {
                transform: translate(-100px, -100px);
            }
        }

        /* Main Content & Graphics Container */
        .hero-content,
        .hero-graphics-container {
            grid-column: 1;
            grid-row: 1;
            width: 100%;
            height: 100%;
        }

        .hero-content {
            display: grid;
            place-items: center;
            text-align: center;
            z-index: 10;
            /* Text is always on top */
            padding: 0 20px;
        }

        /* NEW: Premium Text Gradient */
        .hero-content h1 {
            font-size: clamp(3rem, 6vw, 5rem);
            font-weight: 700;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            max-width: 800px;
            background: linear-gradient(120deg, #ffffff 50%, #d0d8ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-shadow: 0 5px 25px rgba(0, 0, 0, 0.3);
        }

        .hero-content p {
            font-size: clamp(1rem, 2vw, 1.25rem);
            color: var(--text-secondary);
            margin-bottom: 2.5rem;
            max-width: 600px;
            text-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        /* NEW: Elegant CTA Button Styling */
        .elegant-cta {
            position: relative;
            padding: 1rem 2.5rem;
            background-color: var(--accent-blue);
            color: #fff;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            border-radius: 50px;
            border: none;
            z-index: 1;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .elegant-cta::before {
            /* Animated gradient overlay */
            content: "";
            position: absolute;
            top: 0;
            left: -100%;
            width: 300%;
            height: 100%;
            background: linear-gradient(90deg,
                    transparent,
                    rgba(255, 255, 255, 0.2),
                    transparent);
            transition: left 0.8s ease;
        }

        .elegant-cta:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 30px rgba(61, 90, 241, 0.4);
        }

        .elegant-cta:hover::before {
            left: 100%;
        }

        /* --- NEW: Layered Floating UI Graphics --- */
        .graphic-element {
            position: absolute;
            background: linear-gradient(135deg,
                    rgba(255, 255, 255, 0.05),
                    rgba(255, 255, 255, 0));
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3),
                inset 0 0 0 1px rgba(255, 255, 255, 0.05);
            animation: drift 15s ease-in-out infinite alternate;
            transition: transform 0.3s ease-out;
            /* Smooth parallax */
        }

        /* Positioning & Sizing */
        .main-dashboard-card {
            top: 50%;
            left: 50%;
            width: 320px;
            height: 200px;
            transform: translate(-50%, -50%) rotate(-5deg);
            border-radius: 16px;
            padding: 1rem;
            animation-duration: 12s;
        }

        .floating-orb {
            border-radius: 50%;
        }

        .orb-1 {
            top: 20%;
            left: 15%;
            width: 80px;
            height: 80px;
            background: rgba(171, 71, 188, 0.2);
            animation-duration: 10s;
        }

        .orb-2 {
            bottom: 15%;
            right: 10%;
            width: 50px;
            height: 50px;
            background: rgba(61, 90, 241, 0.2);
            animation-duration: 18s;
        }

        .progress-card {
            top: 70%;
            left: 20%;
            width: 200px;
            height: 70px;
            border-radius: 12px;
            padding: 1rem;
            animation-duration: 16s;
        }

        .check-card {
            top: 25%;
            right: 20%;
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: grid;
            place-items: center;
            color: #27c93f;
            font-size: 1.5rem;
            animation-duration: 13s;
        }

        @keyframes drift {
            from {
                transform: translate(var(--tx, 0), var(--ty, 0)) rotate(var(--r, 0));
            }

            to {
                transform: translate(calc(var(--tx, 0) + 20px),
                        calc(var(--ty, 0) - 20px)) rotate(var(--r, 0));
            }
        }

        /* Styling for content INSIDE cards */
        .dashboard-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        .user-pills {
            display: flex;
            align-items: center;
        }

        .user-pills img {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 1px solid #fff;
            margin-left: -8px;
        }

        .user-pills span {
            display: grid;
            place-items: center;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--bg-card);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            font-size: 0.7rem;
            margin-left: -8px;
        }

        .dashboard-chart {
            height: 100px;
        }

        .dashboard-stat {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-top: 1rem;
        }

        .dashboard-stat span {
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .dashboard-stat strong {
            font-size: 1.2rem;
            color: #27c93f;
        }

        .progress-card span {
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .progress-bar {
            width: 100%;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            margin-top: 0.5rem;
        }

        .progress-fill {
            width: 65%;
            height: 100%;
            background: var(--accent-blue);
            border-radius: 3px;
        }

        /* Responsive: Hide graphics on mobile */
        @media (max-width: 768px) {
            .hero-graphics-container {
                display: none;
            }
        }

        /* ====================================================== */
        /* END: ULTIMATE ELEGANCE HERO SECTION CSS                */
        /* ====================================================== */

        /* --- Universal Section Title --- */
        .section-title {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title h3 {
            font-size: 1rem;
            font-weight: 500;
            color: var(--accent-violet);
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 0.5rem;
        }

        .section-title h2 {
            font-size: 2.8rem;
            font-weight: 700;
        }

        /* --- Features Section (New Design) --- */
        .features-showcase-grid {
            display: grid;
            grid-template-columns: 1fr 1.5fr;
            gap: 3rem;
            align-items: center;
        }

        .features-list {
            display: flex;
            flex-direction: column;
            gap: 1rem;
        }

        .feature-item {
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            background-color: transparent;
            cursor: pointer;
            text-align: left;
            color: var(--text-secondary);
            transition: background-color 0.3s ease, border-color 0.3s ease,
                color 0.3s ease;
        }

        .feature-item:hover {
            background-color: var(--bg-card);
            color: var(--text-primary);
        }

        .feature-item.active {
            background-color: var(--bg-card);
            border-color: var(--accent-blue);
            color: var(--text-primary);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.2);
        }

        .feature-item i {
            font-size: 1.8rem;
            color: var(--accent-blue);
            flex-shrink: 0;
        }

        .feature-item h4 {
            font-size: 1.1rem;
            font-weight: 600;
            color: inherit;
            margin-bottom: 0.25rem;
        }

        .feature-item p {
            font-size: 0.9rem;
            line-height: 1.5;
        }

        .feature-preview-panel {
            position: relative;
            height: 450px;
            background: linear-gradient(45deg, #2563eb, #3b82f6);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            padding: 1.5rem;
            overflow: hidden;
        }

        .feature-preview-item {
            position: absolute;
            top: 1.5rem;
            left: 1.5rem;
            right: 1.5rem;
            bottom: 1.5rem;
            opacity: 0;
            transform: translateY(20px) scale(0.98);
            transition: opacity 0.4s ease-out, transform 0.4s ease-out;
            pointer-events: none;
        }

        .feature-preview-item.visible {
            opacity: 1;
            transform: translateY(0) scale(1);
            pointer-events: auto;
        }

        .browser-mockup {
            width: 100%;
            height: 100%;
            border-radius: 8px;
            background-color: var(--bg-dark);
            display: flex;
            flex-direction: column;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .browser-header {
            flex-shrink: 0;
            padding: 0.75rem;
            background-color: rgba(0, 0, 0, 0.2);
            display: flex;
            gap: 0.5rem;
        }

        .browser-header span {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }

        .browser-header span:nth-child(1) {
            background-color: #ff5f56;
        }

        .browser-header span:nth-child(2) {
            background-color: #ffbd2e;
        }

        .browser-header span:nth-child(3) {
            background-color: #27c93f;
        }

        .browser-content {
            padding: 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .chat-preview-animated {
            align-items: flex-start;
            justify-content: flex-end;
            gap: 1rem;
        }

        .chat-bubble-animated {
            padding: 0.75rem 1.25rem;
            border-radius: 20px;
            font-size: 0.9rem;
            max-width: 75%;
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards;
        }

        .chat-bubble-animated.agent {
            background-color: var(--accent-violet);
            align-self: flex-start;
        }

        .chat-bubble-animated.user {
            background-color: var(--accent-blue);
            align-self: flex-end;
            animation-delay: 0.8s;
        }

        .chat-bubble-animated.typing {
            align-self: flex-start;
            background-color: var(--accent-violet);
            animation-delay: 1.8s;
            display: flex;
            gap: 5px;
        }

        .chat-bubble-animated.typing span {
            width: 8px;
            height: 8px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.7);
            animation: typing-bounce 1s infinite;
        }

        .chat-bubble-animated.typing span:nth-child(2) {
            animation-delay: 0.2s;
        }

        .chat-bubble-animated.typing span:nth-child(3) {
            animation-delay: 0.4s;
        }

        .payment-preview-animated .payment-icon {
            font-size: 4rem;
            color: #27c93f;
            margin-bottom: 1.5rem;
            opacity: 0;
            animation: scaleIn 0.5s forwards 0.2s;
        }

        .payment-preview-animated h3 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards 0.5s;
        }

        .payment-preview-animated p {
            color: var(--text-secondary);
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards 0.7s;
        }

        .payment-preview-animated .receipt-id {
            font-size: 0.8rem;
            margin-top: 1.5rem;
            color: #666;
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards 0.9s;
        }

        .feedback-preview-animated img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--accent-blue);
            margin-bottom: 1rem;
            opacity: 0;
            animation: scaleIn 0.5s forwards 0.2s;
        }

        .feedback-preview-animated h4 {
            font-size: 1.5rem;
            font-style: italic;
            color: var(--text-primary);
            margin-bottom: 1rem;
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards 0.5s;
        }

        .feedback-preview-animated .stars i {
            color: #ffbd2e;
            font-size: 1.2rem;
            margin: 0 2px;
            opacity: 0;
            animation: fadeInSlideUp 0.4s forwards;
        }

        .feedback-preview-animated .stars i:nth-child(2) {
            animation-delay: 0.8s;
        }

        .feedback-preview-animated .stars i:nth-child(3) {
            animation-delay: 0.9s;
        }

        .feedback-preview-animated .stars i:nth-child(4) {
            animation-delay: 1s;
        }

        .feedback-preview-animated .stars i:nth-child(5) {
            animation-delay: 1.1s;
        }

        .feedback-preview-animated .author {
            margin-top: 1rem;
            color: var(--text-secondary);
            opacity: 0;
            animation: fadeInSlideUp 0.5s forwards 1.4s;
        }

        .analytics-preview-animated h4 {
            margin-bottom: 2rem;
            font-size: 1.2rem;
        }

        .analytics-preview-animated .chart {
            width: 80%;
            height: 150px;
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            gap: 1rem;
            border-left: 1px solid #444;
            border-bottom: 1px solid #444;
            padding-left: 1rem;
        }

        .chart-bar {
            width: 30px;
            background: linear-gradient(to top,
                    var(--accent-blue),
                    var(--accent-violet));
            border-radius: 4px 4px 0 0;
            position: relative;
            animation: growBar 0.8s cubic-bezier(0.25, 1, 0.5, 1) forwards;
            transform: scaleY(0);
            transform-origin: bottom;
        }

        .chart-bar span {
            position: absolute;
            bottom: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            color: var(--text-secondary);
        }

        .analytics-preview-animated .chart-bar:nth-child(1) {
            animation-delay: 0.2s;
        }

        .analytics-preview-animated .chart-bar:nth-child(2) {
            animation-delay: 0.4s;
        }

        .analytics-preview-animated .chart-bar:nth-child(3) {
            animation-delay: 0.6s;
        }

        .analytics-preview-animated .chart-bar:nth-child(4) {
            animation-delay: 0.8s;
        }

        /* ====================================================== */
        /* START: REPLACEMENT CSS FOR PRICING SECTION             */
        /* ====================================================== */
        /* --- Pricing Section --- */
        /* SUGGESTION: This is the correct start for your new pricing section.
   You have correctly replaced the old code. */
        .pricing-toggle-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 3rem;
            font-weight: 500;
        }

        .save-badge {
            background-color: var(--accent-violet);
            color: var(--text-primary);
            padding: 0.2rem 0.6rem;
            font-size: 0.8rem;
            border-radius: 20px;
            margin-left: 0.5rem;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .pricing-toggle {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 28px;
        }

        .pricing-toggle input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .pricing-toggle .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 34px;
            transition: background-color 0.4s;
        }

        .pricing-toggle .slider:before {
            position: absolute;
            content: "";
            height: 20px;
            width: 20px;
            left: 3px;
            bottom: 3px;
            background-color: var(--text-secondary);
            border-radius: 50%;
            transition: transform 0.4s;
        }

        #pricing-switch:checked+.slider {
            background-color: var(--accent-blue);
        }

        #pricing-switch:checked+.slider:before {
            transform: translateX(22px);
            background-color: white;
        }

        #pricing-switch:checked~.save-badge {
            opacity: 1;
        }

        .pricing-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            align-items: stretch;
        }

        .pricing-card {
            background: var(--bg-card);
            padding: 2.5rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .pricing-card.popular {
            border-color: var(--accent-blue);
            position: relative;
            transform: scale(1.05);
            box-shadow: 0 0 30px rgba(61, 90, 241, 0.3);
        }

        .pricing-card.popular::before {
            content: "Most Popular";
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            background: var(--accent-blue);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .plan-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .plan-header i {
            font-size: 1.5rem;
            color: var(--accent-blue);
        }

        .plan-header h4 {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .plan-description {
            color: var(--text-secondary);
            margin-bottom: 2rem;
            min-height: 50px;
        }

        .plan-price {
            margin-bottom: 2rem;
            font-size: 3rem;
            font-weight: 700;
        }

        .plan-price.custom {
            font-size: 1.8rem;
            display: flex;
            align-items: center;
            min-height: 54px;
        }

        .plan-price sup {
            font-size: 1.5rem;
            font-weight: 500;
            top: -1em;
        }

        .plan-price span {
            font-size: 1rem;
            color: var(--text-secondary);
            font-weight: 400;
        }

        .price-value {
            transition: opacity 0.3s ease-in-out;
            display: inline-block;
        }

        .plan-features {
            list-style: none;
            margin-bottom: 2rem;
            flex-grow: 1;
        }

        .plan-features li {
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .plan-features i {
            color: var(--accent-blue);
        }

        .plan-features i.fa-times {
            color: var(--accent-magenta);
        }

        .plan-button {
            display: block;
            width: 100%;
            text-align: center;
            padding: 1rem;
            border: 2px solid var(--border-color);
            color: var(--text-primary);
            text-decoration: none;
            border-radius: 8px;
            font-weight: 600;
            transition: background-color 0.3s ease, border-color 0.3s ease;
        }

        .plan-button:hover {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .plan-button.popular-button {
            background-color: var(--accent-blue);
            border-color: var(--accent-blue);
        }

        .plan-button.popular-button:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(61, 90, 241, 0.3);
        }

        /* ====================================================== */
        /* START: REPLACEMENT CSS FOR ABOUT SECTION               */
        /* ====================================================== */

        /* --- Part 1: Core Story --- */
        .about-hero-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
            margin-bottom: 6rem;
            /* Space between story and values */
        }

        .about-content p {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
        }

        .about-image-composition {
            position: relative;
            height: 400px;
        }

        .about-image-back,
        .about-image-front {
            width: 80%;
            height: auto;
            object-fit: cover;
            border-radius: var(--border-radius);
            position: absolute;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }

        .about-image-back {
            top: 0;
            right: 0;
        }

        .about-image-front {
            bottom: 0;
            left: 0;
            border: 4px solid var(--bg-dark);
            /* Creates a frame effect */
        }

        /* --- Part 2: Core Values --- */
        .about-values-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
            margin-bottom: 6rem;
            /* Space between values and team */
        }

        .value-card {
            background-color: var(--bg-card);
            padding: 2rem;
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .value-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .value-card i {
            font-size: 2.5rem;
            color: var(--accent-blue);
            margin-bottom: 1rem;
        }

        .value-card h4 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .value-card p {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* --- Part 3: The Team --- */
        .team-title {
            text-align: center;
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 3rem;
        }

        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 2rem;
        }

        .team-member-card {
            text-align: center;
        }

        .team-member-card img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 1rem;
            border: 3px solid var(--border-color);
            transition: transform 0.3s ease, border-color 0.3s ease;
        }

        .team-member-card:hover img {
            transform: scale(1.05);
            border-color: var(--accent-blue);
        }

        .team-member-card h5 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .team-member-card span {
            color: var(--text-secondary);
            font-size: 0.9rem;
        }

        /* --- Responsive Adjustments for About Section --- */
        @media (max-width: 992px) {
            .about-hero-grid {
                grid-template-columns: 1fr;
            }

            .about-image-composition {
                margin-top: 3rem;
                height: 350px;
                /* Adjust for mobile */
            }

            .about-values-grid {
                grid-template-columns: 1fr;
            }

            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 768px) {
            .team-grid {
                grid-template-columns: 1fr;
                /* Stack team members on small screens */
            }
        }

        /* ====================================================== */
        /* END: REPLACEMENT CSS FOR ABOUT SECTION                 */
        /* ====================================================== */

        /* ====================================================== */
        /* END: REPLACEMENT CSS FOR PRICING SECTION               */
        /* ====================================================== */

        .blog-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2rem;
        }

        .blog-card {
            background: var(--bg-card);
            border-radius: var(--border-radius);
            border: 1px solid var(--border-color);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .blog-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .blog-card-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .blog-card-content {
            padding: 1.5rem;
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        .blog-category {
            align-self: flex-start;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--text-primary);
        }

        .blog-card h4 {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
        }

        .blog-excerpt {
            color: var(--text-secondary);
            margin-bottom: 1.5rem;
            flex-grow: 1;
        }

        .blog-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: var(--text-secondary);
            font-size: 0.9rem;
            margin-top: auto;
        }

        .blog-meta i {
            margin-right: 8px;
            color: var(--accent-blue);
        }

        .contact-grid {
            display: grid;
            grid-template-columns: 1fr 1.2fr;
            gap: 4rem;
            align-items: center;
        }

        .contact-info p {
            color: var(--text-secondary);
            margin-bottom: 2rem;
        }

        .contact-details {
            list-style: none;
        }

        .contact-details li {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            color: var(--text-secondary);
        }

        .contact-details i {
            font-size: 1.2rem;
            color: var(--accent-blue);
            margin-right: 1rem;
            width: 20px;
            text-align: center;
        }

        .contact-form .form-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 1rem;
            background-color: var(--bg-card);
            border: 1px solid var(--border-color);
            border-radius: 8px;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }

        .contact-form input:focus,
        .contact-form textarea:focus {
            outline: none;
            border-color: var(--accent-blue);
        }

        .contact-form label {
            position: absolute;
            top: 1rem;
            left: 1rem;
            color: var(--text-secondary);
            pointer-events: none;
            /* OPTIMIZED: Specified transition properties */
            transition: top 0.3s ease, left 0.3s ease, font-size 0.3s ease,
                color 0.3s ease;
        }

        .contact-form input:focus+label,
        .contact-form input:not(:placeholder-shown)+label,
        .contact-form textarea:focus+label,
        .contact-form textarea:not(:placeholder-shown)+label {
            top: -0.75rem;
            left: 0.75rem;
            font-size: 0.8rem;
            color: var(--accent-blue);
            background-color: var(--bg-card);
            padding: 0 0.25rem;
        }

        .submit-button {
            width: 100%;
            padding: 1rem;
            border: none;
            border-radius: 8px;
            background: linear-gradient(90deg,
                    var(--accent-blue),
                    var(--accent-violet));
            color: var(--text-primary);
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .submit-button:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 20px rgba(61, 90, 241, 0.2);
        }

        /* ====================================================== */
        /* START: REPLACEMENT CSS FOR FOOTER SECTION              */
        /* ====================================================== */
        .main-footer {
            background-color: #080810;
            /* A slightly different dark shade for contrast */
            padding-block: clamp(4rem, 8vw, 6rem);
            border-top: 1px solid var(--border-color);
        }

        .footer-grid {
            display: grid;
            /* Use auto-fit for great responsiveness */
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 3rem;
            margin-bottom: 4rem;
        }

        .footer-column .logo {
            margin-bottom: 1rem;
            display: inline-block;
        }

        .footer-column p {
            color: var(--text-secondary);
            line-height: 1.7;
        }

        .footer-column.brand-column p {
            margin-bottom: 1.5rem;
        }

        .footer-column h4 {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            color: var(--text-primary);
        }

        .footer-column ul {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
        }

        .footer-column ul a {
            color: var(--text-secondary);
            text-decoration: none;
            transition: color 0.3s ease, padding-left 0.3s ease;
        }

        .footer-column ul a:hover {
            color: var(--accent-blue);
            padding-left: 5px;
        }

        .social-links {
            display: flex;
            gap: 1.25rem;
        }

        .social-links a {
            color: var(--text-secondary);
            font-size: 1.2rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .social-links a:hover {
            color: var(--text-primary);
            transform: translateY(-3px);
        }

        /* --- Newsletter Form Styling --- */
        .newsletter-form {
            display: flex;
            margin-top: 1rem;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid var(--border-color);
        }

        .newsletter-form:focus-within {
            border-color: var(--accent-blue);
        }

        .newsletter-form input {
            flex-grow: 1;
            border: none;
            background-color: var(--bg-card);
            padding: 0.75rem 1rem;
            color: var(--text-primary);
            font-family: inherit;
            font-size: 0.9rem;
            min-width: 0;
            /* Important for flexbox input shrinking */
        }

        .newsletter-form input:focus {
            outline: none;
        }

        .newsletter-form button {
            border: none;
            background-color: var(--accent-blue);
            color: var(--text-primary);
            padding: 0.75rem 1.25rem;
            cursor: pointer;
            font-size: 1rem;
            transition: background-color 0.3s ease;
        }

        .newsletter-form button:hover {
            background-color: #3148bf;
            /* A slightly darker blue on hover */
        }

        /* --- Footer Bottom Bar --- */
        .footer-bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            /* Allows wrapping on small screens */
            gap: 1rem;
            padding-top: 2rem;
            border-top: 1px solid var(--border-color);
            font-size: 0.9rem;
            color: var(--text-secondary);
        }

        .made-with-love .fa-heart {
            color: var(--accent-magenta);
            margin: 0 4px;
        }



        /* ====================================================== */
        /* END: REPLACEMENT CSS FOR FOOTER SECTION                */
        /* ====================================================== */

        /* --- Animations & Responsive Design --- */
        @keyframes fadeInSlideUp {
            from {
                opacity: 0;
                transform: translateY(15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.8);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @keyframes typing-bounce {

            0%,
            60%,
            100% {
                transform: translateY(0);
            }

            30% {
                transform: translateY(-4px);
            }
        }

        @keyframes growBar {
            from {
                transform: scaleY(0);
            }

            to {
                transform: scaleY(1);
            }
        }

        .reveal-item {
            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.6s ease-out, transform 0.6s ease-out;
        }

        .reveal-item.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* ... (Reveal animation styles are correct) ... */

        #menu-toggle {
            display: none;
            background: none;
            border: none;
            cursor: pointer;
            z-index: 1001;
        }

        #menu-toggle span {
            display: block;
            width: 25px;
            height: 2px;
            background-color: var(--text-primary);
            margin: 5px 0;
            transition: transform 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }

        @media (max-width: 992px) {

            .pricing-grid,
            .blog-grid,
            .about-grid,
            .contact-grid,
            .features-showcase-grid {
                grid-template-columns: 1fr;
            }

            .feature-preview-panel {
                height: 400px;
                margin-top: 2rem;
            }

            .pricing-card,
            .blog-card {
                margin-bottom: 2rem;
            }

            /* FIX: The old file was missing this crucial responsive rule for the popular card.
       This resets its larger size on mobile and gives it extra space to avoid looking cramped. */
            .pricing-card.popular {
                transform: scale(1);
                /* Reset scale on mobile */
                margin-bottom: 4rem;
                /* Give it more vertical space */
            }

            .about-image {
                order: -1;
                margin-bottom: 2rem;
            }

            #menu-toggle {
                display: block;
            }

            .nav-menu-wrapper {
                position: fixed;
                top: 0;
                right: -100%;
                width: 100%;
                height: 100vh;
                background-color: var(--bg-card);
                display: flex;
                justify-content: center;
                align-items: center;
                transition: right 0.5s cubic-bezier(0.77, 0, 0.175, 1);
            }

            .nav-menu-wrapper.active {
                right: 0;
            }

            .nav-menu {
                flex-direction: column;
                gap: 2.5rem;
                text-align: center;
            }

            .nav-link {
                font-size: 1.5rem;
            }

            .contact-button {
                padding: 0.8rem 1.5rem;
            }

            #menu-toggle.active span:nth-child(1) {
                transform: rotate(45deg) translate(5px, 5px);
            }

            #menu-toggle.active span:nth-child(2) {
                opacity: 0;
            }

            #menu-toggle.active span:nth-child(3) {
                transform: rotate(-45deg) translate(7px, -6px);
            }
        }

        @media (max-width: 768px) {
            .main-header {
                top: 10px;
            }

            .main-header.scrolled nav,
            .main-header nav {
                padding: 0.8rem 1.5rem;
            }

            .hero-content h1 {
                font-size: 2.5rem;
            }

            .hero-content p {
                font-size: 1rem;
            }

            .section-title h2 {
                font-size: 2.2rem;
            }

            .blog-grid {
                grid-template-columns: 1fr;
            }
        }

        /* PREROLL ADS */

        .preroll-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
        }

        .preroll-box {
            width: 700px;
            max-width: 90%;
            position: relative;
        }

        .preroll-box video {
            width: 100%;
            border-radius: 10px;
        }

        .close-ad {
            position: absolute;
            top: -35px;
            right: 0;
            background: #3b82f6;
            border: none;
            padding: 8px 14px;
            color: white;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
    <!-- Preroll Ads Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const adOverlay = document.getElementById("prerollAd");
            const closeBtn = document.getElementById("closeAd");

            // tampilkan iklan saat halaman dibuka
            adOverlay.style.display = "flex";

            // auto close setelah 5 detik
            setTimeout(() => {
                adOverlay.style.display = "none";
            }, 5000);

            closeBtn.addEventListener("click", function() {
                adOverlay.style.display = "none";
            });

        });
    </script>
</head>

<body>

    {{-- <!-- PREROLL ADS -->
    <div id="preroll-iklan" class="preroll-overlay">
        <div class="preroll-content">
            <h5>Iklan Spesial</h5>

            <div class="ratio ratio-16x9">
                <iframe src="https://www.youtube.com/embed/HoDKTWGVqmw?autoplay=1" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                    allowfullscreen>
                </iframe>
            </div>

            <button id="skip-btn" disabled>Lewati Iklan (5)</button>
        </div>
    </div> --}}

    <!-- 1. Navigation & Header -->
    <header class="main-header">
        <nav class="container">
            <a href="#" class="logo">Actra</a>
            <div class="nav-menu-wrapper">
                <ul class="nav-menu">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link">beranda</a></li>
                    <li class="nav-item"><a href="{{ url('/about') }}" class="nav-link">About</a></li>
                    <li class="nav-item"><a href="{{ url('/subscription/select-plan') }}" class="nav-link">Fitur</a>
                    </li>
                    <li class="nav-item"><a href="{{ url('/blog') }}" class="nav-link">Blog</a></li>
                    <li class="nav-item"><a href="{{ url('/panduan') }}" class="nav-link">Panduan</a></li>
                    <li class="nav-item"><a href="{{ url('/kontak') }}" class="nav-link">Kontak</a></li>
                    <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link">Absensi</a></li>
                    <li class="nav-item"><a href="{{ url('/register') }}" class="nav-link">Daftar</a></li>
                    <li class="nav-item"><a href="{{ url('/login') }}" class="nav-link">Masuk</a></li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-primary">Coba Gratis</a>
                    </li>
                </ul>
            </div>
            <button id="menu-toggle" aria-label="Open Navigation Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </header>

    <main>
        <!-- ====================================================== -->
        <!-- START: ULTIMATE ELEGANCE HERO SECTION                  -->
        <!-- ====================================================== -->
        <section id="hero" class="scroll-section">
            <!-- Background Elements -->
            <div class="hero-background-pattern"></div>
            <div class="hero-gradient-overlay"></div>

            <!-- The new graphics container for parallax effect -->
            <div class="hero-graphics-container">
                <!-- Main Dashboard Card (Centerpiece) -->
                <div class="graphic-element main-dashboard-card" data-depth="0.2">
                    <div class="dashboard-header">
                        <span>Dashboard</span>
                        <div class="user-pills">
                            <img src="https://i.pravatar.cc/20?img=1" alt="user avatar">
                            <img src="https://i.pravatar.cc/20?img=2" alt="user avatar">
                            <span>+3</span>
                        </div>
                    </div>
                    <div class="dashboard-chart">
                        <svg viewBox="0 0 100 40" xmlns="http://www.w3.org/2000/svg">
                            <path d="M 0 30 C 20 10, 40 10, 60 25 S 80 40, 100 20" fill="none"
                                stroke="url(#chart-gradient)" stroke-width="2" stroke-linecap="round" />
                            <defs>
                                <linearGradient id="chart-gradient" x1="0%" y1="0%" x2="100%"
                                    y2="0%">
                                    <stop offset="0%" stop-color="var(--accent-violet)" />
                                    <stop offset="100%" stop-color="var(--accent-blue)" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </div>
                    <div class="dashboard-stat"><span>Conversion Rate</span><strong>+12.5%</strong></div>
                </div>

                <!-- Satellite Graphics -->
                <div class="graphic-element floating-orb orb-1" data-depth="0.4"></div>
                <div class="graphic-element floating-orb orb-2" data-depth="0.15"></div>
                <div class="graphic-element progress-card" data-depth="0.3">
                    <span>Syncing...</span>
                    <div class="progress-bar">
                        <div class="progress-fill"></div>
                    </div>
                </div>
                <div class="graphic-element check-card" data-depth="0.1">
                    <i class="fas fa-check"></i>
                </div>
            </div>

            <!-- Main Text Content -->
            <div class="hero-content">
                <h1 class="reveal-item">ACTRA~Uctadiv</h1>
                <p class="reveal-item">Track Every Activity</p>
                <a href="#" class="cta-button elegant-cta reveal-item">Get Started for Free</a>
            </div>
        </section>
        <!-- ====================================================== -->
        <!-- END: ULTIMATE ELEGANCE HERO SECTION                    -->
        <!-- ====================================================== -->

        <!-- ====================================================== -->
        <!-- START: REPLACEMENT FOR FEATURES SECTION                -->
        <!-- ====================================================== -->
        <section id="features" class="container scroll-section">
            <div class="section-title reveal-item">
                <h2 class="section-title">Solusi Cerdas Mengelola Aktivitas Kerja</h2>
                <p class="section-subtitle">
                    Actra membantu tim dan organisasi merencanakan, mengelola, dan memantau aktivitas kerja
                    secara lebih efisien dalam satu platform terpadu.
                </p>
            </div>

            <div class="features-showcase-grid">
                <!-- Left Side: Clickable Feature List -->
                <div class="features-list">
                    <button class="feature-item active" data-feature="planning">
                        <i class="fas fa-calendar-check"></i>
                        <div>
                            <h4>Perencanaan Aktivitas</h4>
                            <p>Rencanakan tugas dan aktivitas kerja dengan sistem yang terstruktur dan mudah digunakan.
                            </p>
                        </div>
                    </button>

                    <button class="feature-item" data-feature="task">
                        <i class="fas fa-tasks"></i>
                        <div>
                            <h4>Manajemen Tugas</h4>
                            <p>Kelola berbagai tugas harian tim secara terorganisir agar pekerjaan lebih efektif dan
                                terarah.</p>
                        </div>
                    </button>

                    <button class="feature-item" data-feature="tracking">
                        <i class="fas fa-chart-line"></i>
                        <div>
                            <h4>Monitoring Progres</h4>
                            <p>Pantau perkembangan aktivitas dan pekerjaan secara real-time dalam satu dashboard.</p>
                        </div>
                    </button>

                    <button class="feature-item" data-feature="report">
                        <i class="fas fa-file-alt"></i>
                        <div>
                            <h4>Laporan Aktivitas</h4>
                            <p>Dapatkan laporan aktivitas harian dan mingguan secara otomatis untuk evaluasi kerja.</p>
                        </div>
                    </button>
                </div>

                <!-- Right Side: Dynamic Visual Preview -->
                <div class="feature-preview-panel">

                    <!-- Preview Perencanaan Aktivitas -->
                    <div class="feature-preview-item visible" id="feature-preview-planning">
                        <div class="browser-mockup">
                            <div class="browser-header"><span></span><span></span><span></span></div>
                            <div class="browser-content chat-preview-animated">

                                <div class="chat-bubble-animated agent">
                                    Rencana aktivitas hari ini telah dibuat.
                                </div>

                                <div class="chat-bubble-animated user">
                                    Tambahkan tugas meeting tim pukul 10:00
                                </div>

                                <div class="chat-bubble-animated agent">
                                    Tugas berhasil ditambahkan ke jadwal Anda.
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Preview Manajemen Tugas -->
                    <div class="feature-preview-item" id="feature-preview-task">
                        <div class="browser-mockup">
                            <div class="browser-header"><span></span><span></span><span></span></div>
                            <div class="browser-content payment-preview-animated">

                                <i class="fas fa-tasks payment-icon"></i>

                                <h3>Manajemen Tugas</h3>

                                <p>
                                    Kelola berbagai tugas tim secara terstruktur
                                    agar setiap pekerjaan dapat diselesaikan
                                    dengan lebih efisien.
                                </p>

                                <div class="receipt-id">
                                    Status : Tugas Berhasil Dibuat
                                </div>

                            </div>
                        </div>
                    </div>


                    <!-- Preview Monitoring Progres -->
                    <div class="feature-preview-item" id="feature-preview-tracking">
                        <div class="browser-mockup">
                            <div class="browser-header"><span></span><span></span><span></span></div>
                            <div class="browser-content feedback-preview-animated">

                                <img src="{{ asset('storage/logo/logo-uct.png') }}" alt="Actra">

                                <h4>Monitoring Aktivitas</h4>

                                <div class="stars">
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-check-circle"></i>
                                    <i class="fas fa-check-circle"></i>
                                </div>

                                <p class="author">
                                    Progres aktivitas tim dapat dipantau secara real-time
                                    melalui dashboard Actra.
                                </p>

                            </div>
                        </div>
                    </div>


                    <!-- Preview Laporan Aktivitas -->
                    <div class="feature-preview-item" id="feature-preview-report">
                        <div class="browser-mockup">
                            <div class="browser-header"><span></span><span></span><span></span></div>
                            <div class="browser-content analytics-preview-animated">

                                <h4>Laporan Aktivitas Mingguan</h4>

                                <div class="chart">
                                    <div class="chart-bar" style="height: 40%;"><span>Mon</span></div>
                                    <div class="chart-bar" style="height: 55%;"><span>Tue</span></div>
                                    <div class="chart-bar" style="height: 70%;"><span>Wed</span></div>
                                    <div class="chart-bar" style="height: 80%;"><span>Thu</span></div>
                                </div>

                                <p style="margin-top:10px;font-size:13px;">
                                    Laporan aktivitas membantu organisasi mengevaluasi
                                    produktivitas kerja secara terstruktur.
                                </p>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- ====================================================== -->
        <!-- END: REPLACEMENT FOR FEATURES SECTION                  -->
        <!-- ====================================================== -->


        <!-- ====================================================== -->
        <!-- START: REPLACEMENT FOR PRICING SECTION                 -->
        <!-- ====================================================== -->
        <section id="pricing" class="container scroll-section">

            <div class="section-title reveal-item">
                <h3>Paket Berlangganan</h3>
                <h2>Pilih Paket yang Sesuai dengan Kebutuhan Aktivitas Anda</h2>
                <p>
                    Saat ini Actra masih dalam tahap pengembangan. Seluruh fitur masih dapat diakses
                    pada setiap paket untuk memberikan pengalaman terbaik kepada pengguna.
                    Ke depannya fitur dan harga akan diperbarui sesuai dengan masing-masing paket.
                </p>
                <p style="text-align:center;margin-top:30px;color:#666;">
                    Harga dan pembagian fitur akan diperbarui seiring dengan pengembangan Actra.
                    Pengguna awal akan mendapatkan akses prioritas pada fitur terbaru.
                </p>
            </div>


            <div class="pricing-grid">

                <!-- PLAN BASIC -->
                <div class="pricing-card reveal-item">
                    <div class="plan-header">
                        <i class="fas fa-user"></i>
                        <h4>Basic</h4>
                    </div>

                    <p class="plan-description">
                        Paket dasar untuk individu atau tim kecil yang ingin mulai
                        mengelola aktivitas kerja secara lebih terorganisir.
                    </p>

                    <div class="plan-price custom">
                        <span class="price-value">Coming Soon</span>
                    </div>

                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> Perencanaan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Manajemen Tugas</li>
                        <li><i class="fas fa-check"></i> Monitoring Progres</li>
                        <li><i class="fas fa-check"></i> Laporan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Akses semua fitur (sementara)</li>
                    </ul>

                    <a href="#" class="plan-button">Mulai Sekarang</a>
                </div>


                <!-- PLAN MEDIUM -->
                <div class="pricing-card popular reveal-item">
                    <div class="plan-header">
                        <i class="fas fa-users"></i>
                        <h4>Medium</h4>
                    </div>

                    <p class="plan-description">
                        Paket yang dirancang untuk tim dan organisasi yang membutuhkan
                        sistem pengelolaan aktivitas yang lebih terstruktur.
                    </p>

                    <div class="plan-price custom">
                        <span class="price-value">Coming Soon</span>
                    </div>

                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> Perencanaan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Manajemen Tugas</li>
                        <li><i class="fas fa-check"></i> Monitoring Progres</li>
                        <li><i class="fas fa-check"></i> Laporan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Kolaborasi Tim</li>
                        <li><i class="fas fa-check"></i> Akses semua fitur (sementara)</li>
                    </ul>

                    <a href="#" class="plan-button popular-button">Mulai Sekarang</a>
                </div>


                <!-- PLAN PRO -->
                <div class="pricing-card reveal-item">
                    <div class="plan-header">
                        <i class="fas fa-building"></i>
                        <h4>Pro</h4>
                    </div>

                    <p class="plan-description">
                        Paket lengkap untuk perusahaan yang membutuhkan pengelolaan
                        aktivitas dan monitoring pekerjaan secara lebih komprehensif.
                    </p>

                    <div class="plan-price custom">
                        <span class="price-value">Coming Soon</span>
                    </div>

                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> Perencanaan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Manajemen Tugas</li>
                        <li><i class="fas fa-check"></i> Monitoring Progres</li>
                        <li><i class="fas fa-check"></i> Laporan Aktivitas</li>
                        <li><i class="fas fa-check"></i> Kolaborasi Tim</li>
                        <li><i class="fas fa-check"></i> Dashboard Analitik</li>
                        <li><i class="fas fa-check"></i> Akses semua fitur (sementara)</li>
                    </ul>

                    <a href="#" class="plan-button">Mulai Sekarang</a>
                </div>

            </div>
        </section> <!-- ====================================================== -->
        <!-- END: REPLACEMENT FOR PRICING SECTION                   -->
        <!-- ====================================================== -->

        <!-- ====================================================== -->
        <!-- START: REPLACEMENT FOR ABOUT SECTION                   -->
        <!-- ====================================================== -->
        <section id="about" class="scroll-section">
            <div class="container">

                <!-- Part 1: The Core Story -->
                <div class="about-hero-grid">
                    <div class="about-content reveal-item">
                        <div class="section-title" style="text-align: left; margin-bottom: 2rem;">
                            <h3>Tentang Actra</h3>
                            <h2>Solusi Cerdas untuk Mengelola Aktivitas Kerja</h2>
                        </div>

                        <p>
                            Actra hadir sebagai platform digital yang membantu individu, tim, dan organisasi
                            dalam merencanakan serta mengelola berbagai aktivitas kerja secara lebih terstruktur.
                            Kami memahami bahwa pengelolaan tugas dan aktivitas yang tidak terorganisir
                            dapat menghambat produktivitas serta koordinasi tim.
                        </p>

                        <p>
                            Oleh karena itu, Actra dikembangkan untuk menyediakan sistem yang sederhana,
                            efisien, dan mudah digunakan dalam merencanakan aktivitas, memantau progres pekerjaan,
                            serta menghasilkan laporan aktivitas secara otomatis.
                            Dengan Actra, proses kerja menjadi lebih terorganisir, transparan, dan produktif.
                        </p>
                    </div>

                    <div class="about-image-composition reveal-item">
                        <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                            alt="Team planning activities" class="about-image-back">

                        <img src="https://images.unsplash.com/photo-1552664730-d307ca884978?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                            alt="Activity planning discussion" class="about-image-front">
                    </div>
                </div>


                <!-- Part 2: Core Values -->
                <div class="about-values-grid">

                    <div class="value-card reveal-item">
                        <i class="fas fa-lightbulb"></i>
                        <h4>Inovasi</h4>
                        <p>
                            Kami terus mengembangkan teknologi yang membantu organisasi
                            mengelola aktivitas kerja dengan cara yang lebih modern dan efisien.
                        </p>
                    </div>

                    <div class="value-card reveal-item">
                        <i class="fas fa-users"></i>
                        <h4>Kolaborasi</h4>
                        <p>
                            Actra dirancang untuk mendukung kerja tim sehingga setiap anggota
                            dapat berkolaborasi dan berkontribusi secara lebih efektif.
                        </p>
                    </div>

                    <div class="value-card reveal-item">
                        <i class="fas fa-handshake"></i>
                        <h4>Transparansi</h4>
                        <p>
                            Kami percaya bahwa sistem kerja yang transparan dan terorganisir
                            dapat meningkatkan kepercayaan serta produktivitas tim.
                        </p>
                    </div>

                </div>
            </div>
        </section>
        <!-- ====================================================== -->
        <!-- END: REPLACEMENT FOR ABOUT SECTION                     -->
        <!-- ====================================================== -->

        <!-- NEW: Blog Section -->
        <!-- NEW: Blog Section -->
        <section id="blog" class="container scroll-section">
            <div class="section-title reveal-item">
                <h3>Artikel & Wawasan</h3>
                <h2>Tips Produktivitas dan Manajemen Aktivitas</h2>
            </div>

            <div class="blog-grid">

                <!-- Blog Card 1 -->
                <div class="blog-card reveal-item">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                        alt="Dashboard manajemen aktivitas" class="blog-card-image">

                    <div class="blog-card-content">
                        <span class="blog-category" style="background-color: var(--accent-blue);">
                            Produktivitas
                        </span>

                        <h4>5 Cara Mengelola Aktivitas Kerja Agar Lebih Efisien</h4>

                        <p class="blog-excerpt">
                            Mengelola aktivitas kerja secara terstruktur dapat membantu tim bekerja
                            lebih produktif. Pelajari cara sederhana meningkatkan efisiensi kerja
                            dengan sistem manajemen aktivitas digital.
                        </p>

                        <div class="blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> Jan 12, 2025</span>
                            <a href="#" class="explore-link">Baca Selengkapnya <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Blog Card 2 -->
                <div class="blog-card reveal-item">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                        alt="Tim bekerja sama mengelola tugas" class="blog-card-image">

                    <div class="blog-card-content">
                        <span class="blog-category" style="background-color: var(--accent-blue);">
                            Kolaborasi Tim
                        </span>

                        <h4>Pentingnya Kolaborasi Tim dalam Manajemen Aktivitas</h4>

                        <p class="blog-excerpt">
                            Kolaborasi yang baik dapat meningkatkan kualitas pekerjaan tim.
                            Pelajari bagaimana sistem perencanaan aktivitas membantu tim
                            bekerja lebih terorganisir dan terarah.
                        </p>

                        <div class="blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> Jan 5, 2025</span>
                            <a href="#" class="explore-link">Baca Selengkapnya <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>


                <!-- Blog Card 3 -->
                <div class="blog-card reveal-item">
                    <img src="https://images.unsplash.com/photo-1516321497487-e288fb19713f?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&q=80&w=1080"
                        alt="Perencanaan aktivitas kerja digital" class="blog-card-image">

                    <div class="blog-card-content">
                        <span class="blog-category" style="background-color: var(--accent-blue);">
                            Manajemen Aktivitas
                        </span>

                        <h4>Perencanaan Aktivitas Kerja yang Lebih Terstruktur</h4>

                        <p class="blog-excerpt">
                            Dengan sistem activity planning yang tepat, setiap tugas dapat
                            dipantau dan diselesaikan dengan lebih efektif. Pelajari manfaat
                            menggunakan platform digital untuk perencanaan aktivitas.
                        </p>

                        <div class="blog-meta">
                            <span><i class="fas fa-calendar-alt"></i> Dec 28, 2024</span>
                            <a href="#" class="explore-link">Baca Selengkapnya <i
                                    class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
        <!-- NEW: Contact Section -->
        <!-- NEW: Contact Section -->
        <section id="contact" class="container scroll-section">

            <div class="contact-grid">

                <div class="contact-info reveal-item">

                    <div class="section-title" style="text-align: left; margin-bottom: 2rem;">
                        <h3>Hubungi Kami</h3>
                        <h2>Mari Tingkatkan Produktivitas Bersama Actra</h2>
                    </div>

                    <p>
                        Jika Anda memiliki pertanyaan mengenai platform Actra,
                        ingin mengetahui fitur lebih lanjut, atau tertarik
                        menggunakan sistem manajemen aktivitas kami,
                        silakan hubungi tim kami melalui formulir berikut.
                    </p>

                    <ul class="contact-details">
                        <li><i class="fas fa-map-marker-alt"></i> Magelang, Jawa Tengah, Indonesia</li>
                        <li><i class="fas fa-envelope"></i> support@actra.id</li>
                        <li><i class="fas fa-phone"></i> +62 812 3467 858</li>
                    </ul>

                </div>


                <form class="contact-form reveal-item">

                    <div class="form-group">
                        <input type="text" id="name" name="name" required placeholder=" ">
                        <label for="name">Nama Anda</label>
                    </div>

                    <div class="form-group">
                        <input type="email" id="email" name="email" required placeholder=" ">
                        <label for="email">Email Anda</label>
                    </div>

                    <div class="form-group">
                        <input type="text" id="subject" name="subject" required placeholder=" ">
                        <label for="subject">Subjek</label>
                    </div>

                    <div class="form-group">
                        <textarea id="message" name="message" rows="5" required placeholder=" "></textarea>
                        <label for="message">Pesan Anda</label>
                    </div>

                    <button type="submit" class="submit-button">
                        Kirim Pesan
                    </button>

                </form>

            </div>

        </section>
    </main>

    <!-- ====================================================== -->
    <!-- START: REPLACEMENT FOR FOOTER SECTION                  -->
    <!-- ====================================================== -->
    <!-- ====================================================== -->
    <!-- FOOTER ACTRA VERSION                                   -->
    <!-- ====================================================== -->
    <footer class="main-footer" style="background:#f1f6ff; border-top:1px solid #e2e8f0;">
        <div class="container">

            <div class="footer-grid">

                <!-- Column 1: Brand -->
                <div class="footer-column brand-column">

                    <img src="logo-uct.png" alt="Actra Logo" style="width:150px; margin-bottom:15px;">

                    <p style="color:#64748b;">
                        Actra adalah platform manajemen aktivitas dan perencanaan kerja
                        yang membantu tim bekerja lebih terstruktur, efisien, dan produktif.
                    </p>

                    <p style="color:#64748b;">
                        📍 Jl. Ahmad Yani Perum PJKA No.4, RT.03/RW.02,<br>
                        Magelang, Jawa Tengah
                    </p>

                    <p style="color:#64748b;">📱 0812 3467 858</p>
                    <p style="color:#64748b;">📧 halo@uct.com</p>

                    <div class="social-links">
                        <a href="#"><img src="{{ asset('storage/logo/logo-facebook.jpg') }}"
                                width="22"></a>
                        <a href="#"><img src="{{ asset('storage/logo/logo-twitter.jpg') }}"
                                width="22"></a>
                        <a href="https://www.tiktok.com/@ospod67?_t=ZS-8ycKl7yOd2G&_r=1">
                            <img src="{{ asset('storage/logo/logo-tiktok.jpg') }}" width="22">
                        </a>
                        <a href="https://www.instagram.com/pt_utama_ciptatataasri">
                            <img src="{{ asset('storage/logo/logo-instagram.jpg') }}" width="22">
                        </a>
                        <a href="https://youtube.com/@ospod-milos">
                            <img src="{{ asset('storage/logo/logo-youtube.jpg') }}" width="22">
                        </a>
                        <a href="#">
                            <img src="{{ asset('storage/logo/logo-linkedin.jpg') }}" width="22">
                        </a>
                    </div>

                </div>


                <!-- Column 2 -->
                <div class="footer-column">
                    <h4 style="color:#2563eb;">Tentang Actra</h4>

                    <ul>
                        <li><a href="{{ url('/about') }}">Tentang Kami</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/kontak') }}">FAQ</a></li>
                        <li><a href="#">Jadwalkan Demo</a></li>
                        <li><a href="#">Karir</a></li>
                        <li><a href="{{ url('/login') }}">Login</a></li>
                    </ul>
                </div>


                <!-- Column 3 -->
                <div class="footer-column">
                    <h4 style="color:#2563eb;">Layanan</h4>

                    <ul>
                        <li><a href="{{ url('/panduan') }}">Cara Registrasi</a></li>
                        <li><a href="{{ url('/panduan') }}">Panduan Aplikasi</a></li>
                        <li>
                            <a href="https://sites.google.com/view/uctadiv/halaman-muka">
                                Kebijakan Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/privacy-policy') }}">
                                Kebijakan Privasi
                            </a>
                        </li>
                    </ul>
                </div>


                <!-- Column 4 -->
                <div class="footer-column">
                    <h4 style="color:#2563eb;">Lokasi</h4>

                    <div class="ratio ratio-4x3" style="border-radius:10px; overflow:hidden;">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3260.606862730542!2d110.21981317500169!3d-7.465586392545967!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a8f06c1ce38eb%3A0xb67783d2e0568c26!2sPJKA%204%20(BKW)!5e1!3m2!1sid!2sid!4v1754383919161!5m2!1sid!2sid"
                            style="border:0;" allowfullscreen loading="lazy">
                        </iframe>
                    </div>

                </div>

            </div>


            <div class="footer-bottom" style="border-top:1px solid #e2e8f0; margin-top:40px; padding-top:20px;">
                <p style="color:#64748b;">
                    © 2025 Actra - UCT Activity Plan. Hak cipta dilindungi.
                </p>
            </div>

        </div>
    </footer>
    <!-- ====================================================== -->
    <!-- END: REPLACEMENT FOR FOOTER SECTION                    -->
    <!-- ====================================================== -->

</body>

</html>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        /**
         * Handles the hero section's mouse-move parallax effect.
         */
        const initHeroParallax = () => {
            const heroGraphics = document.querySelector(".hero-graphics");
            if (!heroGraphics) return;

            // Don't run on mobile where it's not visible
            if (window.innerWidth < 768) return;

            document.addEventListener("mousemove", (e) => {
                const {
                    clientX,
                    clientY
                } = e;
                const {
                    innerWidth,
                    innerHeight
                } = window;

                // Calculate movement based on cursor position from center
                // The division by 50 and 30 controls the "intensity" of the effect
                const moveX = (clientX - innerWidth / 2) / 50;
                const moveY = (clientY - innerHeight / 2) / 30;

                heroGraphics.style.transform = `translate(${moveX}px, ${moveY}px)`;
            });
        };

        /**
         * Handles the hero section's multi-layered 3D parallax effect.
         */
        const initHero3DParallax = () => {
            const heroSection = document.querySelector("#hero");
            const graphicsContainer = document.querySelector(
                ".hero-graphics-container"
            );

            if (!heroSection || !graphicsContainer) return;

            // Don't run on mobile where graphics are hidden
            if (window.innerWidth < 768) return;

            heroSection.addEventListener("mousemove", (e) => {
                // Get cursor position relative to the center of the viewport
                const {
                    clientX,
                    clientY
                } = e;
                const centerX = window.innerWidth / 2;
                const centerY = window.innerHeight / 2;
                const moveX = (clientX - centerX) / 20; // Intensity factor
                const moveY = (clientY - centerY) / 20;

                // Apply transform to the whole container for a base movement
                graphicsContainer.style.transform = `translate(${moveX}px, ${moveY}px)`;

                // Apply individual transforms to each graphic element for depth
                const graphicElements =
                    graphicsContainer.querySelectorAll(".graphic-element");
                graphicElements.forEach((el) => {
                    const depth = parseFloat(el.dataset.depth) || 0;
                    const elMoveX = moveX * depth;
                    const elMoveY = moveY * depth;
                    el.style.transform = `translate(${elMoveX}px, ${elMoveY}px)`;
                });
            });
        };

        /**
         * Handles mobile navigation toggle.
         */
        const initMobileNav = () => {
            const menuToggle = document.getElementById("menu-toggle");
            const navMenuWrapper = document.querySelector(".nav-menu-wrapper");
            const navLinks = document.querySelectorAll(".nav-link");

            if (menuToggle && navMenuWrapper) {
                menuToggle.addEventListener("click", () => {
                    menuToggle.classList.toggle("active");
                    navMenuWrapper.classList.toggle("active");
                    document.body.classList.toggle("menu-open");
                });
            }

            // Close menu when a link is clicked
            navLinks.forEach((link) => {
                link.addEventListener("click", () => {
                    if (navMenuWrapper.classList.contains("active")) {
                        menuToggle.classList.remove("active");
                        navMenuWrapper.classList.remove("active");
                        document.body.classList.remove("menu-open");
                    }
                });
            });
        };

        /**
         * Changes header style on scroll.
         */
        const initHeaderScroll = () => {
            const header = document.querySelector(".main-header");
            if (!header) return;

            window.addEventListener("scroll", () => {
                if (window.scrollY > 50) {
                    header.classList.add("scrolled");
                } else {
                    header.classList.remove("scrolled");
                }
            });
        };

        /**
         * Reveals elements on scroll using IntersectionObserver.
         */
        const initScrollReveal = () => {
            const revealItems = document.querySelectorAll(".reveal-item");
            if (revealItems.length === 0) return;

            const revealObserver = new IntersectionObserver(
                (entries, observer) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add("visible");
                            observer.unobserve(entry.target);
                        }
                    });
                }, {
                    threshold: 0.1
                }
            );

            revealItems.forEach((item) => {
                revealObserver.observe(item);
            });
        };

        /**
         * Highlights the active navigation link based on scroll position.
         */
        const initActiveNavHighlighting = () => {
            const sections = document.querySelectorAll(".scroll-section");
            const navLinks = document.querySelectorAll(".nav-link");
            if (sections.length === 0 || navLinks.length === 0) return;

            const highlightObserver = new IntersectionObserver(
                (entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            navLinks.forEach((link) => {
                                link.classList.remove("active-link");
                                if (
                                    link
                                    .getAttribute("href")
                                    .includes(entry.target.id)
                                ) {
                                    link.classList.add("active-link");
                                }
                            });
                        }
                    });
                }, {
                    rootMargin: "-40% 0px -60% 0px"
                }
            ); // Highlights when section is in the middle of the viewport

            sections.forEach((section) => {
                highlightObserver.observe(section);
            });
        };

        /**
         * Handles the interactive features showcase section.
         */
        const initFeatureShowcase = () => {
            const featureItems = document.querySelectorAll(".feature-item");
            const previewItems = document.querySelectorAll(".feature-preview-item");

            if (featureItems.length === 0) return;

            featureItems.forEach((button) => {
                button.addEventListener("click", () => {
                    const featureToShow = button.dataset.feature;

                    // Update active state on buttons
                    featureItems.forEach((item) => item.classList.remove("active"));
                    button.classList.add("active");

                    // Show the corresponding preview
                    previewItems.forEach((preview) => {
                        if (preview.id === `feature-preview-${featureToShow}`) {
                            preview.classList.add("visible");
                        } else {
                            preview.classList.remove("visible");
                        }
                    });
                });
            });
        };

        const initPricingToggle = () => {
            const switchInput = document.getElementById("pricing-switch");
            if (!switchInput) return;

            const pricingCards = document.querySelectorAll(".plan-price");

            switchInput.addEventListener("change", () => {
                const isYearly = switchInput.checked;

                pricingCards.forEach((card) => {
                    const priceValueEl = card.querySelector(".price-value");
                    if (!priceValueEl) return; // Skip the 'Custom' card

                    const monthlyPrice = card.dataset.monthly;
                    const yearlyPrice = card.dataset.yearly;

                    // Add a subtle fade-out effect
                    priceValueEl.style.opacity = "0";

                    setTimeout(() => {
                        priceValueEl.textContent = isYearly ?
                            yearlyPrice :
                            monthlyPrice;
                        // Fade back in
                        priceValueEl.style.opacity = "1";
                    }, 150);
                });
            });
        };

        // Initialize all functionalities
        initHeroParallax();
        initHero3DParallax();
        initMobileNav();
        initHeaderScroll();
        initScrollReveal();
        initActiveNavHighlighting();
        // Add this new function call
        initFeatureShowcase();
        initPricingToggle();
    });
</script>
