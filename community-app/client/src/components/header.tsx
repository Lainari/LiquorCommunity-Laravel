import Image from 'next/image';
import Mainicon from '../../public/svgs/whisky-whiskey-svgrepo-com.svg';

export default function Header() {
  return (
    <header className="bg-white shadow-sm bg-slate-300">
      <div className="mx-auto max-w-[2024px] px-0 md:px-12 lg:px-11 xl:px-16">
        <div className="grid h-20 grid-cols-3 max-lg:grid-cols-2 max-sm:grid-col1 items-center justify-between gap-3">
          <a
            href="/"
            className="flex items-center space-x-1 max-lg:justify-self-center"
          >
            <Image className="h-8 w-auto" src={Mainicon} alt="Mainicon" />
            <h1 className="text-2xl font-extrabold leading-none tracking-tight text-black md:text-3xl lg:text-3xl">
              Whisky Community
            </h1>
          </a>
          <nav className="flex space-x-10 justify-self-center max-lg:hidden">
            <a
              href="/whisky"
              className="text-xl text-black hover:text-gray-500"
            >
              Whisky
            </a>
            <a
              href="/review"
              className="text-xl text-black hover:text-gray-500"
            >
              Review
            </a>
            <a href="/login" className="text-xl text-black hover:text-gray-500">
              Login
            </a>
            <a
              href="/mypage"
              className="text-xl text-black hover:text-gray-500"
            >
              My Page
            </a>
          </nav>
          <div className="ml-6 justify-self-end max-sm:hidden">
            <input
              className="rounded-lg border flex-1 appearance-none border border-gray-500 w-52 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              type="search"
              placeholder="Search"
            />
          </div>
        </div>
      </div>
    </header>
  );
}
