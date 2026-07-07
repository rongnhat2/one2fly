<script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    display: ['Cormorant Garamond', 'serif'],
                    sans: ['Inter', 'sans-serif']
                },
                colors: {
                    brand: '#00C1F4',
                    dark: '#081A2A',
                    canvas: '#F8FBFD',
                    surface: '#FFFFFF',
                    ink: '#081A2A',
                    muted: '#61758A',
                    line: '#E7EEF4',
                    paper: '#F8FBFD',
                    navy: '#081A2A',
                    accent: '#00C1F4',
                    editorial: {
                        bg: '#F8FBFD',
                        panel: '#FFFFFF',
                        gold: '#00C1F4',
                        cta: '#00C1F4',
                        line: '#E7EEF4',
                        ink: '#081A2A'
                    }
                },
                borderRadius: {
                    editorial: '14px'
                },
                boxShadow: {
                    soft: '0 8px 32px rgba(8, 26, 42, 0.06)',
                    card: '0 4px 24px rgba(8, 26, 42, 0.05)',
                    editorial: '0 2px 16px rgba(8, 26, 42, 0.04)'
                }
            }
        }
    }
</script>
