# import sys
# from pypdf import PdfMerger

# if len(sys.argv) != 4:
#     print("Usage: merge.py input1.pdf input2.pdf output.pdf")
#     sys.exit(1)

# pdf1 = sys.argv[1]
# pdf2 = sys.argv[2]
# output = sys.argv[3]

# merger = PdfMerger()
# merger.append(pdf1)
# merger.append(pdf2)
# merger.write(output)
# merger.close()

import sys
from pypdf import PdfWriter

if len(sys.argv) != 4:
    print("Usage: merge.py input1.pdf input2.pdf output.pdf")
    sys.exit(1)

pdf1 = sys.argv[1]
pdf2 = sys.argv[2]
output = sys.argv[3]
print(f"merging {pdf1} and {pdf2} into {output}")

merger = PdfWriter()
merger.append(pdf1)
merger.append(pdf2)

merger.write(sys.argv[3])
merger.close()