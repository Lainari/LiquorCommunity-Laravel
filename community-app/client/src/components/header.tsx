import Image from 'next/image';
import {cookies} from 'next/headers';
import headerIcons from '/public/svgs/header';

const Header = () => {
  const token = cookies().has('XSRF-TOKEN');
  const dashboardTitle = ['whisky', 'review'];
  if (token) {
    dashboardTitle.push('logout', 'mypage');
  } else {
    dashboardTitle.push('login');
  }
  return (
    <header className="bg-white shadow-sm bg-slate-300">
      <div className="mx-auto w-full px-0 md:px-12 lg:px-11 xl:px-16">
        <div className="grid h-20 grid-cols-3 max-lg:grid-cols-2 max-sm:grid-col1 items-center justify-between gap-3">
          <a
            href="/"
            className="flex items-center space-x-1 max-lg:justify-self-center"
          >
            <Image
              className="h-8 w-auto"
              src={headerIcons.MainIcon}
              alt="MainIcon"
              width={30}
              height={30}
            />
            <h1 className="text-2xl font-extrabold leading-none tracking-tight text-black md:text-3xl lg:text-3xl">
              Whisky Community
            </h1>
          </a>
          <nav className="flex space-x-10 justify-self-center max-lg:hidden">
            {dashboardTitle.map(title => (
              <a
                key={title}
                href={`/${title}`}
                className="text-xl text-black hover:text-gray-500"
              >
                {title.slice(0, 1).toUpperCase() + title.slice(1)}
              </a>
            ))}
          </nav>
          <div className="ml-6 justify-self-end max-sm:hidden">
            <input
              className="rounded-lg border flex-1 appearance-none border border-gray-500 w-52 py-2 px-4 bg-white text-gray-700 placeholder-gray-400 shadow-sm text-base focus:outline-none focus:ring-2 focus:ring-purple-600 focus:border-transparent"
              type="search"
              placeholder="Input Whisky Name"
            />
            <button className="rounded-lg ms-2 bg-gray-300 w-20 h-[2.5rem] hover:bg-gray-400 active:bg-stone-400">
              Search
            </button>
          </div>
        </div>
      </div>
    </header>
  );
};

export default Header;
