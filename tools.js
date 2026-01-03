// ==================== TOOL FUNCTIONS ====================

// 1. IP OSINT Lookup
function lookupIP() {
    const ip = document.getElementById('ipInput').value.trim();
    if (!ip) {
        document.getElementById('ipResult').innerHTML = 'Please enter an IP address';
        return;
    }
    
    // Fake OSINT data for demonstration
    const fakeData = {
        '8.8.8.8': {
            country: 'United States',
            isp: 'Google LLC',
            city: 'Mountain View',
            timezone: 'America/Los_Angeles',
            threat: 'Low'
        },
        '1.1.1.1': {
            country: 'Australia',
            isp: 'Cloudflare',
            city: 'Sydney',
            timezone: 'Australia/Sydney',
            threat: 'Low'
        }
    };
    
    let result = `<h3>OSINT Results for ${ip}</h3>`;
    if (fakeData[ip]) {
        const data = fakeData[ip];
        result += `
            <p>📍 <strong>Location:</strong> ${data.city}, ${data.country}</p>
            <p>🏢 <strong>ISP:</strong> ${data.isp}</p>
            <p>⏰ <strong>Timezone:</strong> ${data.timezone}</p>
            <p>🛡️ <strong>Threat Level:</strong> <span style="color: #20c997;">${data.threat}</span></p>
        `;
    } else {
        // Generate random data for unknown IPs
        const countries = ['Indonesia', 'USA', 'Japan', 'Germany', 'UK'];
        const isps = ['Telkom', 'Indihome', 'Biznet', 'First Media', 'XL Axiata'];
        const threats = ['Low', 'Medium', 'High'];
        
        const randomCountry = countries[Math.floor(Math.random() * countries.length)];
        const randomISP = isps[Math.floor(Math.random() * isps.length)];
        const randomThreat = threats[Math.floor(Math.random() * threats.length)];
        
        result += `
            <p>📍 <strong>Location:</strong> ${randomCountry}</p>
            <p>🏢 <strong>ISP:</strong> ${randomISP}</p>
            <p>🛡️ <strong>Threat Level:</strong> <span style="color: ${randomThreat === 'High' ? '#ff6584' : randomThreat === 'Medium' ? '#ffc107' : '#20c997'};">${randomThreat}</span></p>
            <p><em>Note: This is simulated data for demonstration.</em></p>
        `;
    }
    
    document.getElementById('ipResult').innerHTML = result;
}

function getMyIP() {
    fetch('https://api.ipify.org?format=json')
        .then(response => response.json())
        .then(data => {
            document.getElementById('ipInput').value = data.ip;
            lookupIP();
        })
        .catch(() => {
            document.getElementById('ipResult').innerHTML = 'Failed to get your IP. Using demo IP...';
            document.getElementById('ipInput').value = '8.8.8.8';
            lookupIP();
        });
}

// 2. NIK Check
function checkNIK() {
    const nik = document.getElementById('nikInput').value;
    
    if (nik.length !== 16 || isNaN(nik)) {
        document.getElementById('nikResult').innerHTML = '❌ Invalid NIK. Must be 16 digits.';
        return;
    }
    
    // Simulate NIK validation
    const provinceCode = nik.substring(0, 2);
    const regencyCode = nik.substring(2, 4);
    const districtCode = nik.substring(4, 6);
    const birthDate = nik.substring(6, 12);
    const uniqueCode = nik.substring(12);
    
    const provinces = {
        '11': 'Aceh',
        '12': 'Sumatera Utara',
        '13': 'Sumatera Barat',
        '14': 'Riau',
        '31': 'Jakarta',
        '32': 'Jawa Barat',
        '33': 'Jawa Tengah',
        '34': 'Yogyakarta'
    };
    
    const result = `
        <h3>📋 NIK Analysis: ${nik}</h3>
        <p>📍 <strong>Province:</strong> ${provinces[provinceCode] || 'Unknown'}</p>
        <p>🏙️ <strong>Regency Code:</strong> ${regencyCode}</p>
        <p>🏘️ <strong>District Code:</strong> ${districtCode}</p>
        <p>🎂 <strong>Birth Date:</strong> ${birthDate.substring(0,2)}/${birthDate.substring(2,4)}/${birthDate.substring(4,6)}</p>
        <p>🔢 <strong>Unique Code:</strong> ${uniqueCode}</p>
        <p><em>⚠️ This is a simulation for educational purposes only.</em></p>
    `;
    
    document.getElementById('nikResult').innerHTML = result;
}

// 3. Get Source Code
function fetchSourceCode() {
    const url = document.getElementById('urlInput').value;
    
    if (!url.startsWith('http')) {
        document.getElementById('sourceResult').innerHTML = 'Please enter a valid URL starting with http:// or https://';
        return;
    }
    
    // Simulate fetching with a timeout
    document.getElementById('sourceResult').innerHTML = '⏳ Fetching source code...';
    
    setTimeout(() => {
        const fakeSource = `<!DOCTYPE html>
<html>
<head>
    <title>Example Website</title>
    <meta name="description" content="This is a simulated source code">
</head>
<body>
    <h1>Hello from ${new URL(url).hostname}</h1>
    <p>This is simulated HTML source code for demonstration.</p>
    <!-- Simulated by RONI XF Tools -->
</body>
</html>`;
        
        document.getElementById('sourceResult').textContent = fakeSource;
    }, 1500);
}

// 4. HTML Encoder/Decoder
function encodeHTML() {
    const text = document.getElementById('htmlText').value;
    const encoded = text
        .replace(/&/g, '&amp;')
        .replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/"/g, '&quot;')
        .replace(/'/g, '&#39;');
    
    document.getElementById('htmlResult').textContent = encoded;
}

function decodeHTML() {
    const text = document.getElementById('htmlText').value;
    const decoded = text
        .replace(/&amp;/g, '&')
        .replace(/&lt;/g, '<')
        .replace(/&gt;/g, '>')
        .replace(/&quot;/g, '"')
        .replace(/&#39;/g, "'");
    
    document.getElementById('htmlResult').textContent = decoded;
}

// 5. Deploy HTML (Simulation)
function deployFile() {
    const fileInput = document.getElementById('htmlFile');
    
    if (!fileInput.files[0]) {
        document.getElementById('deployResult').innerHTML = 'Please select a file first';
        return;
    }
    
    const fileName = fileInput.files[0].name;
    const fileSize = (fileInput.files[0].size / 1024).toFixed(2);
    
    document.getElementById('deployResult').innerHTML = `
        <h3>🚀 Deployment Successful!</h3>
        <p>✅ File: ${fileName}</p>
        <p>📦 Size: ${fileSize} KB</p>
        <p>🔗 Your site is now live at:</p>
        <p><strong>https://ronixf.github.io/${fileName.replace('.html', '')}/</strong></p>
        <p>⏳ It may take 1-2 minutes to propagate.</p>
        <p><em>Note: This is a simulation. Actual deployment requires GitHub account.</em></p>
    `;
}

// 6. Web to APK Generator
function generateAPK() {
    const url = document.getElementById('webUrl').value;
    const name = document.getElementById('appName').value;
    
    if (!url || !name) {
        document.getElementById('apkResult').innerHTML = 'Please enter both URL and App Name';
        return;
    }
    
    document.getElementById('apkResult').innerHTML = `
        <h3>📱 APK Generation Complete!</h3>
        <p>✅ App Name: ${name}</p>
        <p>🔗 Website: ${url}</p>
        <p>📦 APK Size: ~4.2 MB</p>
        <p>⬇️ <button onclick="downloadFakeAPK('${name}')">Download ${name}.apk</button></p>
        <p><em>Note: This generates a simulated APK file for demonstration.</em></p>
    `;
}

function downloadFakeAPK(name) {
    alert(`Simulated download: ${name}.apk (4.2 MB)\n\nIn a real implementation, this would download the actual APK file.`);
}

// 7. Phishing Scanner
function scanPhishing() {
    const url = document.getElementById('scanUrl').value;
    
    if (!url) {
        document.getElementById('scanResult').innerHTML = 'Please enter a URL to scan';
        return;
    }
    
    // Simulate scanning
    document.getElementById('scanResult').innerHTML = '🛡️ Scanning URL for threats...';
    
    setTimeout(() => {
        const random = Math.random();
        let result;
        
        if (random > 0.7) {
            result = `
                <h3 style="color: #ff6584;">⚠️ HIGH RISK - Potential Phishing Detected!</h3>
                <p>URL: ${url}</p>
                <p>Threat Level: <strong>High</strong></p>
                <p>Issues Found:</p>
                <ul>
                    <li>Suspicious domain structure</li>
                    <li>Missing SSL certificate</li>
                    <li>Reports from 3 threat databases</li>
                </ul>
                <p>🔒 Recommendation: Do not visit this site.</p>
            `;
        } else if (random > 0.3) {
            result = `
                <h3 style="color: #ffc107;">🟡 MEDIUM RISK - Suspicious Elements Found</h3>
                <p>URL: ${url}</p>
                <p>Threat Level: <strong>Medium</strong></p>
                <p>Issues Found:</p>
                <ul>
                    <li>New domain (registered recently)</li>
                    <li>No reputation data available</li>
                </ul>
                <p>⚠️ Recommendation: Proceed with caution.</p>
            `;
        } else {
            result = `
                <h3 style="color: #20c997;">✅ LOW RISK - Looks Safe</h3>
                <p>URL: ${url}</p>
                <p>Threat Level: <strong>Low</strong></p>
                <p>Security Checks Passed:</p>
                <ul>
                    <li>Valid SSL certificate</li>
                    <li>No phishing reports found</li>
                    <li>Domain age: >1 year</li>
                </ul>
                <p>👍 This site appears to be safe.</p>
            `;
        }
        
        document.getElementById('scanResult').innerHTML = result;
    }, 2000);
}

// 8. Music Search
function searchMusic() {
    const query = document.getElementById('musicInput').value;
    const platform = document.getElementById('platform').value;
    
    if (!query) {
        document.getElementById('musicResult').innerHTML = 'Enter song name or artist';
        return;
    }
    
    const platforms = {
        'youtube': 'YouTube Music',
        'spotify': 'Spotify'
    };
    
    const songs = [
        {title: 'Night Changes', artist: 'One Direction', duration: '3:47'},
        {title: 'As It Was', artist: 'Harry Styles', duration: '2:47'},
        {title: 'Starboy', artist: 'The Weeknd', duration: '3:50'},
        {title: 'Blinding Lights', artist: 'The Weeknd', duration: '3:22'},
        {title: 'Shape of You', artist: 'Ed Sheeran', duration: '3:54'}
    ];
    
    let result = `<h3>🎵 Search Results for "${query}" on ${platforms[platform]}</h3>`;
    
    songs.forEach(song => {
        if (song.title.toLowerCase().includes(query.toLowerCase()) || 
            song.artist.toLowerCase().includes(query.toLowerCase())) {
            result += `
                <div style="margin: 10px 0; padding: 10px; background: rgba(255,255,255,0.05); border-radius: 8px;">
                    <p><strong>${song.title}</strong> - ${song.artist}</p>
                    <p>⏱️ ${song.duration} | Platform: ${platforms[platform]}</p>
                    <button onclick="playSong('${song.title}')">▶️ Play</button>
                    <button onclick="downloadSong('${song.title}')">⬇️ Download</button>
                </div>
            `;
        }
    });
    
    if (result === `<h3>🎵 Search Results for "${query}" on ${platforms[platform]}</h3>`) {
        result += `<p>No exact matches found. Try different keywords.</p>`;
    }
    
    document.getElementById('musicResult').innerHTML = result;
}

function playSong(title) {
    alert(`Now playing: ${title}\n\nIn a real implementation, this would play the actual song.`);
}

function downloadSong(title) {
    alert(`Downloading: ${title}.mp3\n\nIn a real implementation, this would download the actual file.`);
}

// 9. iPhone Chat Generator
function generateChat() {
    const sender = document.getElementById('senderName').value || 'RONI XF';
    const receiver = document.getElementById('receiverName').value || 'Friend';
    const message = document.getElementById('chatText').value || 'Hello!';
    
    const timestamp = new Date().toLocaleTimeString([], {hour: '2-digit', minute:'2-digit'});
    
    const chatHTML = `
        <div style="background: #007AFF; color: white; padding: 10px; border-radius: 18px 18px 4px 18px; max-width: 70%; margin-left: auto; margin-bottom: 10px;">
            <strong>${sender}</strong><br>
            ${message}
            <div style="font-size: 12px; text-align: right; opacity: 0.8;">${timestamp}</div>
        </div>
        
        <div style="background: #E5E5EA; color: black; padding: 10px; border-radius: 18px 18px 18px 4px; max-width: 70%; margin-bottom: 10px;">
            <strong>${receiver}</strong><br>
            Hey! I'm doing great. How about you?
            <div style="font-size: 12px; text-align: right; opacity: 0.8;">${timestamp}</div>
        </div>
        
        <div style="background: #007AFF; color: white; padding: 10px; border-radius: 18px 18px 4px 18px; max-width: 70%; margin-left: auto;">
            <strong>${sender}</strong><br>
            Just working on my portfolio website with awesome tools!
            <div style="font-size: 12px; text-align: right; opacity: 0.8;">${timestamp}</div>
        </div>
    `;
    
    document.getElementById('chatResult').innerHTML = `
        <h3>💬 iPhone Chat Preview</h3>
        <div style="background: white; color: black; padding: 20px; border-radius: 15px; border: 1px solid #ccc; font-family: -apple-system, sans-serif;">
            <div style="background: #F2F2F7; padding: 10px; text-align: center; border-bottom: 1px solid #ccc;">
                <strong>${receiver}</strong><br>
                <small>iPhone • ${timestamp}</small>
            </div>
            <div style="padding: 15px; min-height: 200px;">
                ${chatHTML}
            </div>
        </div>
        <p><button onclick="screenshotChat()">📸 Take Screenshot</button></p>
    `;
}

function screenshotChat() {
    alert('📸 Chat screenshot saved to gallery!\n\nIn a real implementation, this would capture the chat area.');
}

// 10. Chat Bot AI
const aiResponses = [
    "Hello! I'm RONI XF AI Assistant. How can I help you today?",
    "I can help you with web development, cybersecurity, and using the tools on this site.",
    "That's an interesting question! Let me think about that...",
    "For security-related queries, always remember to practice ethical hacking.",
    "Did you know this website was built with pure HTML, CSS, and JavaScript?",
    "I'm here to assist you 24/7. What else would you like to know?",
    "Try out the other tools in the menu - they're all functional!",
    "Remember to always keep your software updated for security."
];

function sendMessage() {
    const input = document.getElementById('userInput').value;
    if (!input.trim()) return;
    
    const chatHistory = document.getElementById('chatHistory');
    
    // Add user message
    chatHistory.innerHTML += `<p><strong>You:</strong> ${input}</p>`;
    
    // Clear input
    document.getElementById('userInput').value = '';
    
    // Simulate AI thinking
    setTimeout(() => {
        const randomResponse = aiResponses[Math.floor(Math.random() * aiResponses.length)];
        chatHistory.innerHTML += `<p><strong>AI:</strong> ${randomResponse}</p>`;
        chatHistory.scrollTop = chatHistory.scrollHeight;
    }, 1000);
}

// 11. JavaScript Obfuscator
function obfuscateJS() {
    const code = document.getElementById('jsCode').value;
    
    // Simple obfuscation simulation
    const obfuscated = code
        .replace(/function/g, 'ƒ')
        .replace(/console\.log/g, 'c.l')
        .replace(/var /g, 'v')
        .replace(/let /g, 'l')
        .replace(/const /g, 'c')
        .split('').map(char => {
            // Add some random character encoding
            if (Math.random() > 0.7) {
                return String.fromCharCode(char.charCodeAt(0) + 1);
            }
            return char;
        }).join('');
    
    document.getElementById('jsResult').textContent = `// Obfuscated by RONI XF Tools\n${obfuscated}`;
}

// 12. TikTok Downloader
function downloadTikTok() {
    const url = document.getElementById('tiktokUrl').value;
    const quality = document.getElementById('quality').value;
    
    if (!url.includes('tiktok.com')) {
        document.getElementById('tiktokResult').innerHTML = 'Please enter a valid TikTok URL';
        return;
    }
    
    const qualities = {
        'hd': '1080p HD',
        'sd': '720p SD',
        'audio': 'MP3 Audio'
    };
    
    document.getElementById('tiktokResult').innerHTML = `
        <h3>✅ TikTok Video Ready!</h3>
        <p>🔗 URL: ${url}</p>
        <p>📊 Quality: ${qualities[quality]}</p>
        <p>💾 Size: ${quality === 'hd' ? '15.2 MB' : quality === 'sd' ? '8.7 MB' : '3.4 MB'}</p>
        
        <div style="background: #000; color: white; padding: 15px; border-radius: 10px; text-align: center; margin: 15px 0;">
            <p>🎬 TikTok Video Preview</p>
            <p>▶️ [Video Player Would Appear Here]</p>
            <p>👍 42K likes | 💬 1.2K comments</p>
        </div>
        
        <button onclick="downloadVideo()">⬇️ Download ${qualities[quality]}</button>
        <button onclick="downloadAudio()">🎵 Download Audio Only</button>
        
        <p><em>Note: This is a simulation. Actual download requires TikTok API.</em></p>
    `;
}

function downloadVideo() {
    alert('📥 Download started!\n\nIn a real implementation, this would download the actual video.');
}

function downloadAudio() {
    alert('🎵 Audio download started!\n\nIn a real implementation, this would download the MP3 file.');
}

// ==================== INITIALIZATION ====================

// Initialize the website
function initWebsite() {
    // Create menu items
    const menuContainer = document.querySelector('.menu');
    const mainContent = document.querySelector('.main-content');
    
    TOOLS.forEach((tool, index) => {
        // Create menu button
        const menuItem = document.createElement('button');
        menuItem.className = `menu-item ${index === 0 ? 'active' : ''}`;
        menuItem.innerHTML = `<i class="${tool.icon}"></i> ${tool.name}`;
        menuItem.onclick = () => switchTool(tool.id);
        menuContainer.appendChild(menuItem);
        
        // Create tool section
        const toolSection = document.createElement('div');
        toolSection.className = `tool-section ${index === 0 ? 'active' : ''}`;
        toolSection.id = `${tool.id}-section`;
        toolSection.innerHTML = tool.content;
        mainContent.appendChild(toolSection);
    });
    
    // Initialize birthday counter
    updateBirthdayCounter();
    
    // Load first tool
    switchTool('portfolio');
}

// Switch between tools
function switchTool(toolId) {
    // Update menu
    document.querySelectorAll('.menu-item').forEach(item => {
        item.classList.remove('active');
    });
    
    document.querySelectorAll('.menu-item').forEach(item => {
        if (item.textContent.includes(TOOLS.find(t => t.id === toolId).name)) {
            item.classList.add('active');
        }
    });
    
    // Update content
    document.querySelectorAll('.tool-section').forEach(section => {
        section.classList.remove('active');
    });
    
    document.getElementById(`${toolId}-section`).classList.add('active');
    
    // Close mobile menu if open
    document.getElementById('sidebar').classList.remove('mobile-visible');
}

// Birthday counter
function updateBirthdayCounter() {
    // Set RONI XF's birthday (example: August 15)
    const today = new Date();
    const currentYear = today.getFullYear();
    const birthday = new Date(currentYear, 7, 15); // August 15 (month 7)
    
    if (today > birthday) {
        birthday.setFullYear(currentYear + 1);
    }
    
    const diffTime = birthday - today;
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    document.getElementById('birthdayCounter').textContent = `${diffDays} hari menuju ulang tahun!`;
}

// Mobile menu toggle
function toggleMobileMenu() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('mobile-visible');
}

// Initialize when page loads
document.addEventListener('DOMContentLoaded', initWebsite);

// Add CSS for skill bars
const style = document.createElement('style');
style.textContent = `
    .skill-bar {
        margin: 15px 0;
    }
    
    .skill-bar p {
        display: flex;
        justify-content: space-between;
        margin-bottom: 5px;
    }
    
    .progress {
        height: 10px;
        border-radius: 5px;
        background: #6c63ff;
    }
    
    .progress-bar {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
        overflow: hidden;
        margin: 5px 0 15px 0;
    }
    
    .progress-fill {
        height: 10px;
        background: linear-gradient(45deg, #6c63ff, #ff6584);
        border-radius: 10px;
    }
`;
document.head.appendChild(style);
