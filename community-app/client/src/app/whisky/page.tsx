import React from 'react';

const Whisky: React.FC = () => {
  return (
    <div className="flex flex-col items-center justify-center w-full h-full py-12">
      <div className="container max-w-4xl px-6">
        <h1 className="text-6xl font-bold tracking-tighter">Whisky Page</h1>
        <div className="mt-8 space-y-4 text-gray-600">
          <p>
            Whisky, or whiskey, is a type of distilled alcoholic beverage made
            from fermented grain mash. <br />
            Various grains (which may be malted) are used for different
            varieties, including barley, corn, rye, and wheat. <br />
            Whisky is typically aged in wooden casks, often oak, and may be
            blended with other whiskies.
          </p>
          <p className="text-sm">
            <em>
              Source:
              <a
                className="underline"
                href="https://en.wikipedia.org/wiki/Whisky"
              >
                Wikipedia
              </a>
            </em>
          </p>
          <div className="inline-flex h-10 items-center justify-center rounded-md bg-gray-900 px-8 text-sm font-medium text-gray-50 shadow transition-colors hover:bg-gray-900/90 focus-visible:outline-none focus-visible:ring-1 focus-visible:ring-gray-950 disabled:pointer-events-none disabled:opacity-50">
            <button>Create Whisky Posts</button>
          </div>
        </div>
      </div>
      <div className="mt-20 flex">
        <p className="text-6xl font-bold tracking-tighter">
          Whisky Information
        </p>
      </div>
    </div>
  );
};

export default Whisky;
