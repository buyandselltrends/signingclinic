import React, { useState, useEffect } from 'react';
import { 
  Globe2, Zap, Shield, Briefcase, LayoutDashboard, 
  Menu, X, Search, Moon, Sun, ChevronDown, 
  ArrowRight, MessageSquare, Download, CheckCircle2,
  FileText, Mic, Layout, Database, Star, Users
} from 'lucide-react';

export default function App() {
  const [isDarkMode, setIsDarkMode] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);

  useEffect(() => {
    if (isDarkMode) {
      document.documentElement.classList.add('dark');
    } else {
      document.documentElement.classList.remove('dark');
    }
  }, [isDarkMode]);

  return (
    <div className={`min-h-screen font-sans antialiased transition-colors duration-200 ${isDarkMode ? 'dark bg-gray-900 text-gray-100' : 'bg-white text-gray-900'}`}>
      
      {/* Navigation */}
      <nav className="fixed w-full z-50 bg-white/80 dark:bg-gray-900/80 backdrop-blur-md border-b border-gray-200 dark:border-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-20">
            {/* Logo */}
            <div className="flex-shrink-0 flex items-center gap-2">
              <div className="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-500/20">
                <Globe2 className="w-6 h-6 text-white" />
              </div>
              <span className="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-purple-600">
                Signing Clinic
              </span>
            </div>

            {/* Desktop Menu */}
            <div className="hidden md:flex items-center space-x-8">
              <div className="relative group">
                <button className="flex items-center space-x-1 text-sm font-medium hover:text-blue-600 transition-colors">
                  <span>Solutions</span>
                  <ChevronDown className="w-4 h-4 transition-transform group-hover:rotate-180" />
                </button>
                <div className="absolute left-1/2 -translate-x-1/2 top-full mt-2 w-[480px] opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 transform origin-top pt-4">
                  <div className="bg-white dark:bg-gray-800 rounded-2xl shadow-2xl ring-1 ring-black ring-opacity-5 p-6 grid grid-cols-2 gap-6">
                    <a href="#" className="flex gap-4 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors group/link">
                      <div className="w-10 h-10 bg-blue-50 dark:bg-blue-900/30 rounded-lg flex items-center justify-center text-blue-600">
                        <FileText className="w-5 h-5" />
                      </div>
                      <div>
                        <p className="text-sm font-bold group-hover/link:text-blue-600">Documents</p>
                        <p className="text-xs text-gray-500 mt-0.5">Translate PDF, Word, Excel</p>
                      </div>
                    </a>
                    <a href="#" className="flex gap-4 p-3 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors group/link">
                      <div className="w-10 h-10 bg-purple-50 dark:bg-purple-900/30 rounded-lg flex items-center justify-center text-purple-600">
                        <Mic className="w-5 h-5" />
                      </div>
                      <div>
                        <p className="text-sm font-bold group-hover/link:text-blue-600">Interpreter</p>
                        <p className="text-xs text-gray-500 mt-0.5">Live VRI & OPI sessions</p>
                      </div>
                    </a>
                  </div>
                </div>
              </div>
              <a href="#" className="text-sm font-medium hover:text-blue-600 transition-colors">Pricing</a>
              <a href="#" className="text-sm font-medium hover:text-blue-600 transition-colors">Enterprise</a>
            </div>

            {/* Right Actions */}
            <div className="flex items-center space-x-4">
              <button 
                onClick={() => setIsDarkMode(!isDarkMode)}
                className="p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
              >
                {isDarkMode ? <Sun className="w-5 h-5" /> : <Moon className="w-5 h-5" />}
              </button>
              <div className="hidden sm:flex items-center space-x-3">
                <a href="#" className="text-sm font-medium hover:text-blue-600 px-4">Sign in</a>
                <a href="#" className="px-5 py-2.5 text-sm font-bold text-white bg-blue-600 rounded-xl hover:bg-blue-700 transition-all shadow-lg shadow-blue-500/25">Get Started</a>
              </div>
              <button 
                onClick={() => setIsMobileMenuOpen(!isMobileMenuOpen)}
                className="md:hidden p-2 text-gray-500"
              >
                {isMobileMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
              </button>
            </div>
          </div>
        </div>

        {/* Mobile menu */}
        {isMobileMenuOpen && (
          <div className="md:hidden bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-800 p-4 space-y-4">
            <a href="#" className="block py-2 font-medium">Services</a>
            <a href="#" className="block py-2 font-medium">Pricing</a>
            <div className="pt-4 space-y-2">
              <a href="#" className="block w-full text-center py-3 bg-gray-100 dark:bg-gray-800 rounded-xl font-bold">Sign In</a>
              <a href="#" className="block w-full text-center py-3 bg-blue-600 text-white rounded-xl font-bold">Create Account</a>
            </div>
          </div>
        )}
      </nav>

      <main>
        {/* Hero Section */}
        <section className="relative pt-32 pb-24 lg:pt-48 lg:pb-32 overflow-hidden">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
            <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-blue-50 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400 text-xs font-bold mb-6 ring-1 ring-blue-100 dark:ring-blue-800">
              <Zap className="w-3 h-3" />
              <span>Newly Released: AI Interpretation Engine V2</span>
            </div>
            <h1 className="text-5xl lg:text-7xl font-extrabold tracking-tight mb-8">
              Speak the world's <br/>
              <span className="text-transparent bg-clip-text bg-gradient-to-r from-blue-600 to-purple-600">languages seamlessly</span>
            </h1>
            <p className="text-xl text-gray-500 dark:text-gray-400 max-w-2xl mx-auto mb-10 leading-relaxed">
              Enterprise-grade translation and interpretation powered by advanced AI and verified by human experts. Accuracy in seconds, not hours.
            </p>
            <div className="flex flex-col sm:flex-row justify-center gap-4">
              <button className="px-8 py-4 bg-blue-600 text-white font-bold rounded-2xl hover:bg-blue-700 hover:scale-105 transition-all shadow-xl shadow-blue-500/25 flex items-center justify-center">
                Start for Free <ArrowRight className="ml-2 w-5 h-5" />
              </button>
              <button className="px-8 py-4 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 font-bold rounded-2xl hover:bg-gray-50 dark:hover:bg-gray-750 transition-all flex items-center justify-center">
                View Demo
              </button>
            </div>
          </div>
          
          {/* Background Elements */}
          <div className="absolute top-0 left-1/2 -translate-x-1/2 w-full max-w-7xl h-full -z-10 pointer-events-none opacity-20 dark:opacity-40">
            <div className="absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full blur-[120px]"></div>
            <div className="absolute bottom-20 right-10 w-96 h-96 bg-purple-400 rounded-full blur-[150px]"></div>
          </div>
        </section>

        {/* Sign Language Spotlight */}
        <section className="py-12 -mt-12 relative z-20">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="bg-gradient-to-r from-blue-700 via-indigo-700 to-purple-800 rounded-[40px] p-8 lg:p-12 text-white shadow-2xl relative overflow-hidden">
              <div className="absolute top-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl -translate-y-1/2 translate-x-1/2"></div>
              <div className="relative z-10 flex flex-col lg:flex-row items-center justify-between gap-8">
                <div className="text-center lg:text-left">
                  <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/20 text-white text-[10px] font-black uppercase tracking-widest mb-4">
                    <Star className="w-3 h-3 fill-white" />
                    Specialized Access
                  </div>
                  <h2 className="text-3xl lg:text-4xl font-black mb-4">Sign Language Services</h2>
                  <p className="text-blue-100 max-w-xl text-lg">
                    Full accessibility compliance with premier <strong>American Sign Language (ASL)</strong> and <strong>Ghanaian Sign Language (GSL)</strong> interpretation.
                  </p>
                </div>
                <div className="flex flex-wrap justify-center gap-4">
                  <div className="bg-white/10 backdrop-blur-md border border-white/20 px-6 py-4 rounded-3xl text-center min-w-[160px]">
                    <p className="text-2xl font-black mb-1">ASL</p>
                    <p className="text-[10px] uppercase font-bold opacity-70">American Sign</p>
                  </div>
                  <div className="bg-white/10 backdrop-blur-md border border-white/20 px-6 py-4 rounded-3xl text-center min-w-[160px]">
                    <p className="text-2xl font-black mb-1">GSL</p>
                    <p className="text-[10px] uppercase font-bold opacity-70">Ghanaian Sign</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Translation Widget Mockup */}
        <section className="py-12">
          <div className="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl border border-gray-200 dark:border-gray-700 overflow-hidden">
               <div className="p-6 border-b border-gray-100 dark:border-gray-700 flex justify-between items-center bg-gray-50 dark:bg-gray-900/50">
                  <div className="flex gap-4">
                    <select className="bg-transparent border-none font-bold text-sm focus:ring-0 cursor-pointer">
                      <option>English</option>
                      <option>Spanish</option>
                    </select>
                    <ArrowRight className="w-4 h-4 text-gray-400" />
                    <select className="bg-transparent border-none font-bold text-sm focus:ring-0 cursor-pointer text-blue-600">
                      <option>Spanish</option>
                      <option>English</option>
                    </select>
                  </div>
                  <div className="text-xs font-medium text-gray-500 bg-gray-100 dark:bg-gray-700 px-3 py-1 rounded-full">
                    Balance: 1,250 Credits
                  </div>
               </div>
               <div className="grid grid-cols-1 md:grid-cols-2">
                  <div className="p-8 border-r border-gray-100 dark:border-gray-700 min-h-[240px]">
                    <textarea 
                      placeholder="Start typing..." 
                      className="w-full h-full bg-transparent border-none focus:ring-0 text-lg resize-none placeholder-gray-400"
                      defaultValue="Hello, how can I help you translate your enterprise documents today?"
                    ></textarea>
                  </div>
                  <div className="p-8 bg-gray-50/50 dark:bg-gray-850/50 min-h-[240px]">
                     <p className="text-lg text-gray-600 dark:text-gray-300 italic">
                       Hola, ¿cómo puedo ayudarle a traducir sus documentos empresariales hoy?
                     </p>
                  </div>
               </div>
               <div className="p-6 bg-white dark:bg-gray-800 flex justify-end">
                  <button className="bg-indigo-600 hover:bg-indigo-700 text-white font-bold px-8 py-3 rounded-xl transition-all shadow-lg shadow-indigo-500/20">
                    Translate (1 Credit)
                  </button>
               </div>
            </div>
          </div>
        </section>

        {/* Services Priority Grid */}
        <section className="py-24 bg-gray-50 dark:bg-gray-950">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="text-center mb-16">
              <h2 className="text-3xl font-black mb-4 uppercase tracking-tight">Enterprise Interpretation Services</h2>
              <p className="text-gray-500 max-w-xl mx-auto">Elite linguistic support delivered through our specialized, HIPAA-compliant global network.</p>
            </div>
            <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
              {[
                { title: "Phone Interpretation", desc: "Real-time interpretation via phone. Immediate audio connection to certified linguists.", icon: <Mic className="text-blue-600" />, badge: "Most Popular" },
                { title: "Video Interpretation", desc: "Live video-based interpreting. HD visual communication for complex settings.", icon: <Globe2 className="text-purple-600" />, badge: "VRI Ready" },
                { title: "On-site Interpreting", desc: "In-person interpreter service. Local expert dispatch for sensitive conferences.", icon: <Briefcase className="text-green-600" />, badge: "Global Dispatch" },
                { title: "ASL Interpreting", desc: "American Sign Language specialists. Certified interpretation for full ADA compliance.", icon: <Users className="text-yellow-600" />, badge: "Certified" }
              ].map((f, i) => (
                <div key={i} className="bg-white dark:bg-gray-900 p-8 rounded-[32px] border border-gray-100 dark:border-gray-800 hover:shadow-2xl transition-all hover:-translate-y-2 relative group">
                  {f.badge && (
                    <div className="absolute top-4 right-4 bg-blue-50 dark:bg-blue-900/40 text-blue-600 dark:text-blue-400 text-[10px] font-black uppercase tracking-widest px-2 py-1 rounded-full opacity-0 group-hover:opacity-100 transition-opacity">
                      {f.badge}
                    </div>
                  )}
                  <div className="w-14 h-14 rounded-2xl bg-gray-50 dark:bg-gray-800 flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                    {f.icon}
                  </div>
                  <h3 className="text-lg font-black mb-3">{f.title}</h3>
                  <p className="text-sm text-gray-500 dark:text-gray-400 leading-relaxed">{f.desc}</p>
                </div>
              ))}
            </div>
          </div>
        </section>

        {/* Deployment Modes */}
        <section className="py-24 border-t border-gray-100 dark:border-gray-800">
          <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div className="bg-blue-600 rounded-[60px] p-12 lg:p-20 text-white relative overflow-hidden shadow-2xl shadow-blue-500/20">
              <div className="absolute top-0 right-0 w-1/2 h-full bg-white/5 skew-x-12 translate-x-1/2"></div>
              <div className="relative z-10">
                <div className="text-center mb-16">
                  <h2 className="text-4xl font-black mb-4">Strategic Deployment Modes</h2>
                  <p className="text-blue-100 text-lg opacity-80">Flexible operational models tailored to your specific project needs.</p>
                </div>
                <div className="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-8">
                  {[
                    { title: "On-demand", desc: "Instant Connection" },
                    { title: "Scheduled", desc: "Pre-booked slots" },
                    { title: "OPI", desc: "Audio Only" },
                    { title: "VRI", desc: "Live Video" },
                    { title: "AI Interpreter", desc: "Instant AI-powered translation", special: true }
                  ].map((m, i) => (
                    <div key={i} className={`p-6 rounded-3xl border ${m.special ? 'bg-white text-blue-600' : 'bg-white/10 border-white/10'} backdrop-blur-sm text-center transform hover:scale-105 transition-all`}>
                      <p className="text-xs font-black uppercase tracking-widest opacity-60 mb-2">Mode {i+1}</p>
                      <h4 className="font-black text-lg mb-1">{m.title}</h4>
                      <p className={`text-[10px] ${m.special ? 'text-blue-500' : 'text-blue-100'} font-bold`}>{m.desc}</p>
                    </div>
                  ))}
                </div>
              </div>
            </div>
          </div>
        </section>

        {/* Export Info (Secondary) */}
        <section className="py-20 border-t border-gray-100 dark:border-gray-800">
           <div className="max-w-4xl mx-auto px-4">
              <div className="bg-indigo-600 p-12 rounded-[40px] text-white flex flex-col items-center text-center shadow-2xl shadow-indigo-500/30">
                 <div className="w-16 h-16 bg-white/20 rounded-2xl flex items-center justify-center mb-6">
                    <Download className="w-8 h-8" />
                 </div>
                 <h2 className="text-3xl font-bold mb-4">Development Architecture Ready</h2>
                 <p className="text-indigo-100 mb-10 max-w-2xl text-lg">
                   The theme root and all 9 specialized plugin engines (Wallet, Matching, Interpreter, etc.) are available for export.
                 </p>
                 <div className="grid grid-cols-2 sm:grid-cols-4 gap-6 w-full max-w-md">
                    <div className="text-center">
                      <p className="text-2xl font-bold">28</p>
                      <p className="text-[10px] uppercase tracking-widest opacity-70 font-bold">Templates</p>
                    </div>
                    <div className="text-center">
                      <p className="text-2xl font-bold">9</p>
                      <p className="text-[10px] uppercase tracking-widest opacity-70 font-bold">Plugins</p>
                    </div>
                    <div className="text-center">
                      <p className="text-2xl font-bold">100%</p>
                      <p className="text-[10px] uppercase tracking-widest opacity-70 font-bold">Responsive</p>
                    </div>
                    <div className="text-center">
                      <p className="text-2xl font-bold">Fast</p>
                      <p className="text-[10px] uppercase tracking-widest opacity-70 font-bold">Tailwind</p>
                    </div>
                 </div>
              </div>
           </div>
        </section>
      </main>

      {/* Footer */}
      <footer className="bg-white dark:bg-gray-900 pt-20 pb-10 border-t border-gray-100 dark:border-gray-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div className="col-span-1 md:col-span-1">
              <div className="flex items-center gap-2 mb-6">
                <Globe2 className="w-6 h-6 text-blue-600" />
                <span className="text-xl font-bold">Signing Clinic</span>
              </div>
              <p className="text-sm text-gray-500 leading-relaxed">Breaking language barriers with human-like AI translation and interpretation. Fast, secure, and accurate.</p>
            </div>
            <div>
              <h4 className="font-bold text-sm mb-6 uppercase tracking-wider">Product</h4>
              <ul className="space-y-4 text-sm text-gray-500">
                <li><a href="#" className="hover:text-blue-600 transition-colors">Features</a></li>
                <li><a href="#" className="hover:text-blue-600 transition-colors">Pricing</a></li>
                <li><a href="#" className="hover:text-blue-600 transition-colors">Enterprise</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold text-sm mb-6 uppercase tracking-wider">Support</h4>
              <ul className="space-y-4 text-sm text-gray-500">
                <li><a href="#" className="hover:text-blue-600 transition-colors">Documentation</a></li>
                <li><a href="#" className="hover:text-blue-600 transition-colors">API Status</a></li>
                <li><a href="#" className="hover:text-blue-600 transition-colors">Contact</a></li>
              </ul>
            </div>
            <div>
              <h4 className="font-bold text-sm mb-6 uppercase tracking-wider">Legal</h4>
              <ul className="space-y-4 text-sm text-gray-500">
                <li><a href="#" className="hover:text-blue-600 transition-colors">Privacy Policy</a></li>
                <li><a href="#" className="hover:text-blue-600 transition-colors">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div className="pt-8 border-t border-gray-100 dark:border-gray-800 flex flex-col sm:flex-row justify-between items-center gap-4">
            <p className="text-xs text-gray-400">&copy; 2026 Signing Clinic. A professional interpretation and translation ecosystem.</p>
            <div className="flex gap-6">
               <div className="w-5 h-5 bg-gray-200 dark:bg-gray-800 rounded-full"></div>
               <div className="w-5 h-5 bg-gray-200 dark:bg-gray-800 rounded-full"></div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}
