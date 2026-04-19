jQuery(document).ready(function($) {
    const $copyBtn = $('#lte-copy-link');
    const $inviteLink = $('#lte-invite-link');
    
    $copyBtn.on('click', function() {
        $inviteLink[0].select();
        document.execCommand('copy');
        
        $copyBtn.text('Copied!');
        setTimeout(() => $copyBtn.text('Copy Invite Link'), 2000);
    });

    // Simulate AI Live Captions typing effect
    const sourceCaptions = [
        "Welcome everyone to the quarterly review.",
        "Today we'll discuss the new project timeline.",
        "Does anyone have questions about the interpretation integration?"
    ];
    
    const targetCaptions = {
        es: [
            "Bienvenidos todos a la revisión trimestral.",
            "Hoy discutiremos el cronograma del nuevo proyecto.",
            "¿Alguien tiene preguntas sobre la integración de interpretación?"
        ],
        fr: [
            "Bienvenue à tous à la revue trimestrielle.",
            "Aujourd'hui, nous discuterons du calendrier du nouveau projet.",
            "Quelqu'un a-t-il des questions sur l'intégration de l'interprétation ?"
        ],
        ja: [
            "四半期レビューへようこそ。",
            "本日は新しいプロジェクトのスケジュールについて話し合います。",
            "通訳の統合について質問はありますか？"
        ],
        zh: [
            "欢迎大家参加季度审查。",
            "今天我们将讨论新项目的时间表。",
            "有人对口译整合有疑问吗？"
        ],
        en: [
            "Welcome everyone to the quarterly review.",
            "Today we'll discuss the new project timeline.",
            "Does anyone have questions about the interpretation integration?"
        ] // Same for testing
    };

    let currentIndex = 0;
    
    setInterval(() => {
        const lang = $('#lte-my-language').val();
        
        // Update arrays
        currentIndex = (currentIndex + 1) % sourceCaptions.length;
        
        // Simple UI swap
        $('.lte-subtitle-source').text('"' + sourceCaptions[currentIndex] + '"');
        $('.lte-subtitle-target').text('"' + targetCaptions[lang][currentIndex] + '"');
        
    }, 6000); // Swap every 6 seconds to simulate speech
});
