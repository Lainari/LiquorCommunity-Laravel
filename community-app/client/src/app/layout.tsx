import {Header, Footer} from '@/components/index';
import '../styles/globals.css';

const RootLayout = ({children}: {children: React.ReactNode}) => {
  return (
    <html>
      <body className="bg-gray-100 min-h-screen font-sans text-gray-900">
        <Header />
        <div className="h-[100vh]">
          <div className="flex-1">{children}</div>
        </div>
        <Footer />
      </body>
    </html>
  );
};

export default RootLayout;
