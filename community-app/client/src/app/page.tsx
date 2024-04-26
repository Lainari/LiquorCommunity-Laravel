'use client';

import {NextPage} from 'next';
import Image from 'next/image';
import Link from 'next/link';
import mainImages from '/public/images/main';
import bottleIcons from '/public/svgs/main';
import styles from '@/styles/Home.module.css';

const Home: NextPage = () => {
  const bottlePage: ('whisky' | 'cocktail' | 'liquor')[] = [
    'whisky',
    'cocktail',
    'liquor',
  ];
  const colors = [
    'bg-red-200 hover:bg-rose-300',
    'bg-green-200 hover:bg-lime-300',
    'bg-blue-200 hover:bg-sky-300',
  ];
  return (
    <>
      <div className="flex w-3/4 my-10 p-6 bg-white">
        <div className="w-1/2">
          <Image
            src={mainImages.background}
            alt={'background'}
            width={600}
            height={0}
            className={styles.imageFadeIn}
          />
        </div>
        <div className="w-1/2 flex justify-center">
          <div className="m-4">
            <p
              className={`text-center text-3xl mt-12 mb-6 font-extrabold ${styles.textFadeIn1}`}
            >
              Welcome to Liquor Community
            </p>
            <p
              className={`text-center text-xl leading-loose ${styles.textFadeIn2}`}
            >
              Share your mainstream information here
              <br /> Whiskey, cocktails, whatever! <br />
              And for those who are new to the world of spirits,
              <br /> leave a review to help bring them into the fold!
            </p>
            <div
              className={`mt-10 flex justify-center w-full ${styles.textFadeIn2}`}
            >
              <div className="grid grid-cols-3 gap-6">
                {bottlePage.map((page, index) => (
                  <Link href={`/${page}`} key={index}>
                    <div
                      className={`flex flex-col items-center justify-center rounded-lg p-4 h-48 ${colors[index]} cursor-pointer`}
                    >
                      <p className="text-md font-bold mb-4">{`${page.charAt(0).toUpperCase() + page.slice(1)} Page`}</p>
                      <Image
                        src={bottleIcons[page]}
                        alt={page}
                        width={80}
                        height={120}
                      />
                    </div>
                  </Link>
                ))}
              </div>
            </div>
          </div>
        </div>
      </div>
    </>
  );
};

export default Home;
