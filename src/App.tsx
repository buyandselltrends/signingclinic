import React from 'react';
import { Download, Globe, CheckCircle2, Zap, ArrowRight, Video, FileText } from 'lucide-react';
import { downloadTheme } from './lib/theme-generator';

export default function App() {
  return (
    <div className="min-h-screen bg-slate-50 dark:bg-[#09090b] text-slate-900 dark:text-slate-50 font-sans relative selection:bg-teal-500/30">
      
      {/* Exporter Sticky Banner */}
      <div className="fixed bottom-6 left-1/2 -translate-x-1/2 z-[100] bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border border-slate-200 dark:border-slate-700 shadow-2xl rounded-full px-4 py-3 flex items-center gap-4">
        <div className="hidden sm:block text-sm font-medium mr-2">
          WordPress Theme Ready
        </div>
        <button
          onClick={downloadTheme}
          className="flex items-center gap-2 bg-teal-500 hover:bg-teal-600 text-white px-6 py-2 rounded-full font-medium transition-colors shadow-lg shadow-teal-500/25"
        >
          <Download className="w-4 h-4" />
          Download Theme (.zip)
        </button>
      </div>

      {/* HEADER PREVIEW */}
      <header className="sticky top-0 z-50 w-full backdrop-blur-lg bg-white/70 dark:bg-[#09090b]/70 border-b border-slate-200 dark:border-slate-800">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex items-center justify-between h-16">
            <div className="flex items-center gap-2">
              <div className="text-teal-500"><Globe className="w-8 h-8" /></div>
              <span className="font-bold text-xl tracking-tight" style={{fontFamily: 'Lexend, sans-serif'}}>Voxlingo</span>
            </div>
            <nav className="hidden md:flex space-x-8 text-sm font-medium text-slate-600 dark:text-slate-300">
              <a href="#" className="hover:text-teal-500 transition">Services</a>
              <a href="#" className="hover:text-teal-500 transition">Pricing</a>
              <a href="#" className="hover:text-teal-500 transition">About</a>
              <a href="#" className="hover:text-teal-500 transition">Contact</a>
            </nav>
            <div className="hidden md:flex items-center space-x-4">
              <a href="#" className="text-sm font-medium hover:text-teal-500 transition">Log in</a>
              <a href="#" className="text-sm font-medium px-4 py-2 rounded-full bg-teal-500 text-white hover:bg-teal-600 transition shadow">Get Started</a>
            </div>
          </div>
        </div>
      </header>

      {/* HERO SECTION */}
      <section className="relative overflow-hidden pt-24 pb-32 sm:pt-32 sm:pb-40">
        <div className="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80 pointer-events-none">
          <div className="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-[#14b8a6] to-[#3b82f6] opacity-20 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"></div>
        </div>
        
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
          <div className="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 dark:bg-slate-800 border border-slate-200 dark:border-slate-700 text-sm font-medium mb-8">
            <span className="flex h-2 w-2 rounded-full bg-teal-500"></span> Voxlingo API 2.0 is now live
          </div>
          <h1 className="text-5xl md:text-7xl font-semibold tracking-tight mb-8" style={{fontFamily: 'Lexend, sans-serif'}}>
            Speak to the world.<br/><span className="text-transparent bg-clip-text bg-gradient-to-r from-teal-500 to-blue-500">Zero language barriers.</span>
          </h1>
          <p className="max-w-2xl mx-auto text-lg md:text-xl text-slate-600 dark:text-slate-400 mb-10">
            AI-powered translation and interpretation in 100+ languages. Instantly integrate neural machine translation or book human interpreters on demand.
          </p>
          <div className="flex flex-col sm:flex-row justify-center gap-4">
            <button className="px-8 py-4 rounded-full bg-slate-900 dark:bg-white text-white dark:text-slate-900 font-medium hover:bg-slate-800 dark:hover:bg-slate-100 transition shadow-lg">Start Building Free</button>
            <button className="px-8 py-4 rounded-full bg-white dark:bg-[#09090b] text-slate-900 dark:text-white border border-slate-200 dark:border-slate-800 font-medium hover:bg-slate-50 dark:hover:bg-slate-900 transition shadow-sm">View Services</button>
          </div>
        </div>
      </section>

      {/* SERVICES OVERVIEW */}
      <section className="py-24 bg-white dark:bg-[#040405] border-y border-slate-200 dark:border-slate-800/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="mb-16">
            <h2 className="text-3xl md:text-4xl font-semibold mb-4" style={{fontFamily: 'Lexend, sans-serif'}}>Precision at every scale.</h2>
            <p className="text-xl text-slate-500 dark:text-slate-400 max-w-2xl">From instant neural string translation to verified human experts for your most critical meetings.</p>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div className="bg-slate-50 dark:bg-[#09090b] p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition">
              <div className="w-12 h-12 rounded-2xl bg-teal-50 dark:bg-teal-900/30 flex items-center justify-center mb-6">
                <Zap className="h-6 w-6 text-teal-500" />
              </div>
              <h3 className="text-xl font-semibold mb-3">Neural API</h3>
              <p className="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">Sub-100ms latency translation API trained on custom terminology for enterprise software.</p>
              <a href="#" className="text-teal-500 font-medium text-sm flex items-center hover:text-teal-600 mt-auto">Explore API <ArrowRight className="w-4 h-4 ml-1" /></a>
            </div>
            
            <div className="bg-slate-50 dark:bg-[#09090b] p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition">
              <div className="w-12 h-12 rounded-2xl bg-purple-50 dark:bg-purple-900/30 flex items-center justify-center mb-6">
                <FileText className="h-6 w-6 text-purple-500" />
              </div>
              <h3 className="text-xl font-semibold mb-3">Human-in-the-Loop</h3>
              <p className="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">AI draft translation seamlessly routed to verified human linguists for guaranteed accuracy.</p>
              <a href="#" className="text-purple-500 font-medium text-sm flex items-center hover:text-purple-600 mt-auto">Learn More <ArrowRight className="w-4 h-4 ml-1" /></a>
            </div>
            
            <div className="bg-slate-50 dark:bg-[#09090b] p-8 rounded-3xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col items-start hover:shadow-md transition">
              <div className="w-12 h-12 rounded-2xl bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center mb-6">
                <Video className="h-6 w-6 text-blue-500" />
              </div>
              <h3 className="text-xl font-semibold mb-3">Live Interpretation</h3>
              <p className="text-slate-500 dark:text-slate-400 text-sm mb-6 flex-grow">Book over-the-phone or video interpreters instantly for medical, legal, or business needs.</p>
              <a href="#" className="text-blue-500 font-medium text-sm flex items-center hover:text-blue-600 mt-auto">Book Now <ArrowRight className="w-4 h-4 ml-1" /></a>
            </div>
          </div>
        </div>
      </section>

      {/* HOW IT WORKS */}
      <section className="py-24">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="mb-16 text-center">
            <h2 className="text-3xl font-semibold mb-4" style={{fontFamily: 'Lexend, sans-serif'}}>How it works</h2>
          </div>
          <div className="grid grid-cols-1 md:grid-cols-3 gap-12 relative">
            <div className="hidden md:block absolute top-[28px] left-[16%] right-[16%] h-px bg-slate-200 dark:bg-slate-800 z-0"></div>
            
            <div className="text-center relative z-10">
              <div className="w-14 h-14 bg-white dark:bg-[#09090b] border border-teal-500 text-teal-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">1</div>
              <h3 className="font-semibold text-lg mb-2">Connect</h3>
              <p className="text-sm text-slate-500 dark:text-slate-400">Integrate our SDKs into your app or upload documents in the dashboard.</p>
            </div>
            <div className="text-center relative z-10">
              <div className="w-14 h-14 bg-white dark:bg-[#09090b] border border-teal-500 text-teal-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">2</div>
              <h3 className="font-semibold text-lg mb-2">Process</h3>
              <p className="text-sm text-slate-500 dark:text-slate-400">Our routing engine chooses pure AI, hybrid, or human based on your parameters.</p>
            </div>
            <div className="text-center relative z-10">
              <div className="w-14 h-14 bg-white dark:bg-[#09090b] border border-teal-500 text-teal-500 rounded-full flex items-center justify-center text-xl font-bold mx-auto mb-6 shadow-sm">3</div>
              <h3 className="font-semibold text-lg mb-2">Deliver</h3>
              <p className="text-sm text-slate-500 dark:text-slate-400">Receive hyper-accurate translations or connect with a live interpreter immediately.</p>
            </div>
          </div>
        </div>
      </section>

      {/* PRICING SECTION */}
      <section className="py-24 bg-white dark:bg-[#040405] border-y border-slate-200 dark:border-slate-800/60">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-3xl md:text-4xl font-semibold mb-4" style={{fontFamily: 'Lexend, sans-serif'}}>Simple, transparent pricing.</h2>
            <p className="text-lg text-slate-500 dark:text-slate-400">Pay only for what you use. No enterprise lock-in.</p>
          </div>
          
          <div className="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-5xl mx-auto">
            {/* Developer */}
            <div className="bg-slate-50 dark:bg-[#09090b] p-8 rounded-3xl border border-slate-200 dark:border-slate-800">
              <h3 className="text-xl font-semibold mb-2">Developer</h3>
              <div className="text-3xl font-bold mb-4">$0<span className="text-sm font-normal text-slate-500"> /mo</span></div>
              <p className="text-sm text-slate-500 mb-6">Perfect for testing the API.</p>
              <ul className="space-y-3 mb-8 text-sm">
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> 500k MT characters / mo</li>
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> Community Support</li>
              </ul>
              <button className="w-full py-3 rounded-full border border-slate-300 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition font-medium">Get Started</button>
            </div>

            {/* Pro */}
            <div className="bg-[#0f172a] dark:bg-[#1e293b] p-8 rounded-3xl border border-teal-500 relative transform md:-translate-y-4 shadow-xl">
              <div className="absolute top-0 right-8 transform -translate-y-1/2">
                <span className="bg-teal-500 text-white text-xs font-bold uppercase tracking-wider py-1 px-3 rounded-full">Popular</span>
              </div>
              <h3 className="text-xl font-semibold mb-2 text-white">Pro</h3>
              <div className="text-3xl font-bold mb-4 text-white">$49<span className="text-sm font-normal text-slate-400"> /mo</span></div>
              <p className="text-sm text-slate-400 mb-6">For scaling applications.</p>
              <ul className="space-y-3 mb-8 text-sm text-slate-300">
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> 5M MT characters / mo</li>
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> $0.05 / word for Human</li>
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> Email Support</li>
              </ul>
              <button className="w-full py-3 rounded-full bg-teal-500 text-white font-medium hover:bg-teal-600 transition tracking-wide">Start Free Trial</button>
            </div>

            {/* Enterprise */}
            <div className="bg-slate-50 dark:bg-[#09090b] p-8 rounded-3xl border border-slate-200 dark:border-slate-800">
              <h3 className="text-xl font-semibold mb-2">Enterprise</h3>
              <div className="text-3xl font-bold mb-4">Custom</div>
              <p className="text-sm text-slate-500 mb-6">For mission-critical deployments.</p>
              <ul className="space-y-3 mb-8 text-sm">
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> Unlimited MT routing</li>
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> Volume discounts</li>
                <li className="flex items-center gap-2"><CheckCircle2 className="w-4 h-4 text-teal-500" /> Dedicated Account Manager</li>
              </ul>
              <button className="w-full py-3 rounded-full border border-slate-300 dark:border-slate-700 hover:bg-slate-100 dark:hover:bg-slate-800 transition font-medium">Contact Sales</button>
            </div>
          </div>
        </div>
      </section>

      {/* CTA SECTION */}
      <section className="py-24 bg-[#0f172a] border-t border-slate-800 relative xl:rounded-3xl xl:max-w-[95%] xl:mx-auto xl:my-16 overflow-hidden">
        <div className="absolute inset-0 opacity-10 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-white via-transparent to-transparent pointer-events-none"></div>
        <div className="max-w-4xl mx-auto px-4 text-center relative z-10">
          <h2 className="text-4xl text-white font-semibold mb-6" style={{fontFamily: 'Lexend, sans-serif'}}>Ready to break the language barrier?</h2>
          <p className="text-teal-50 text-lg mb-10 max-w-2xl mx-auto opacity-80">Join thousands of companies using Voxlingo to communicate securely and accurately across borders.</p>
          <button className="inline-block px-8 py-4 rounded-full bg-teal-500 text-white font-medium hover:bg-teal-400 transition-colors shadow-lg">Start for free</button>
        </div>
      </section>

      {/* FOOTER */}
      <footer className="bg-slate-50 dark:bg-[#040405] border-t border-slate-200 dark:border-slate-800/60 py-12">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid grid-cols-1 md:grid-cols-4 gap-8">
            <div className="col-span-1 md:col-span-1">
              <div className="flex items-center gap-2 mb-4">
                <Globe className="w-6 h-6 text-teal-500" />
                <span className="font-semibold text-lg tracking-tight" style={{fontFamily: 'Lexend, sans-serif'}}>Voxlingo</span>
              </div>
              <p className="text-sm text-slate-500 dark:text-slate-400">
                Real-time AI-powered translation and interpretation for borderless communication.
              </p>
            </div>
            <div>
              <h3 className="text-sm font-semibold tracking-wider uppercase mb-4 text-slate-900 dark:text-slate-50">Product</h3>
              <ul className="space-y-3 text-sm text-slate-500 dark:text-slate-400">
                <li><a href="#" className="hover:text-teal-500 transition-colors">Features</a></li>
                <li><a href="#" className="hover:text-teal-500 transition-colors">Pricing</a></li>
                <li><a href="#" className="hover:text-teal-500 transition-colors">API Documentation</a></li>
              </ul>
            </div>
            <div>
              <h3 className="text-sm font-semibold tracking-wider uppercase mb-4 text-slate-900 dark:text-slate-50">Company</h3>
              <ul className="space-y-3 text-sm text-slate-500 dark:text-slate-400">
                <li><a href="#" className="hover:text-teal-500 transition-colors">About</a></li>
                <li><a href="#" className="hover:text-teal-500 transition-colors">Blog</a></li>
                <li><a href="#" className="hover:text-teal-500 transition-colors">Contact</a></li>
              </ul>
            </div>
            <div>
              <h3 className="text-sm font-semibold tracking-wider uppercase mb-4 text-slate-900 dark:text-slate-50">Legal</h3>
              <ul className="space-y-3 text-sm text-slate-500 dark:text-slate-400">
                <li><a href="#" className="hover:text-teal-500 transition-colors">Privacy Policy</a></li>
                <li><a href="#" className="hover:text-teal-500 transition-colors">Terms of Service</a></li>
              </ul>
            </div>
          </div>
          <div className="mt-12 pt-8 border-t border-slate-200 dark:border-slate-800/60 text-center text-sm text-slate-500 dark:text-slate-400">
            &copy; {new Date().getFullYear()} Voxlingo AI. All rights reserved. WP Theme Exporter generated by AI Studio.
          </div>
        </div>
      </footer>

    </div>
  );
}
