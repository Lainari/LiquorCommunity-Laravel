import {Header, Footer} from '@/components/index';
import '../styles/globals.css';

const RootLayout = ({children}: {children: React.ReactNode}) => {
  return (
    <html>
      <body className="bg-gray-100 font-sans text-gray-900 min-h-screen">
        <div className="flex flex-col justify-between min-h-screen">
          <Header />
          <div className="flex-grow flex justify-center">{children}</div>
          <Footer />
        </div>
      </body>
    </html>
  );
};

export default RootLayout;
