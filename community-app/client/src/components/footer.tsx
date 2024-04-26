import Image from 'next/image';
import footerIcon from '/public/svgs/footer';

const Footer = () => {
  return (
    <footer className="bg-slate-50 w-full">
      <div className="flex justify-center items-center py-8 sm:flex-row-reverse sm:justify-center">
        <a
          className="mx-3"
          aria-label="move on Instagram"
          href="https://www.instagram.com/s.jin_seok/"
        >
          <Image
            src={footerIcon.instar}
            alt={'instarIcon'}
            width={35}
            height={35}
          />
        </a>
        <a
          className="mx-3"
          aria-label="move on GitHub"
          href="https://github.com/Lainari"
        >
          <Image
            src={footerIcon.github}
            alt={'githubIcon'}
            width={35}
            height={35}
          />
        </a>
        <p className="mt-6 me-10 text-center tracking-wide text-sm text-slate-500 sm:mt-0">
          This web page made by Jinseok Seok. <br />
          More information on SNS
        </p>
      </div>
    </footer>
  );
};

export default Footer;
